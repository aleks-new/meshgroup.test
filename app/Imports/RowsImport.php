<?php namespace App\Imports;

use App\Models\Row;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\RemembersRowNumber;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Events\BeforeImport;

class RowsImport implements ToModel, WithChunkReading, ShouldQueue, WithEvents, WithHeadingRow, WithCalculatedFormulas {
    use RemembersRowNumber, Importable;

    protected $uniqueId;

    public function __construct(string $uniqueId) {
        $this->uniqueId = $uniqueId;
    }

    public function model(array $row): Row {
        Redis::connection()->set('rows.' . $this->uniqueId, $this->getRowNumber());
        $row = Row::find($row['id']);
        return $row
            ? $row->fill([
                'name' => $row['name'],
                'date' => $row['date']
            ])
            : new Row([
                'id'   => $row['id'],
                'name' => $row['name'],
                'date' => $row['date'],
            ]);
    }

    public function chunkSize(): int {
        return 1000;
    }

    public function registerEvents(): array {
        return [
            AfterImport::class => [self::class, 'afterImport'],
            BeforeImport::class => [self::class, 'beforeImport']
        ];
    }

    public static function afterImport(AfterImport $event) {
        // $creator = $event->reader->getProperties()->getCreator();
    }

    public static function beforeImport(BeforeImport $event) {
        // $creator = $event->reader->getProperties()->getCreator();
    }
}

?>
