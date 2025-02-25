<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportResource\Pages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Attendance;
use App\Models\Staff;

class ReportResource extends Resource
{
    protected static ?string $model = Attendance::class; // Use Attendance, not Report

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('start_date')
                    ->label('Start Date')
                    ->required(),
                Forms\Components\DatePicker::make('end_date')
                    ->label('End Date')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('staff.name')->label('Staff Name'),
                Tables\Columns\TextColumn::make('date')->label('Attendance Date'),
                Tables\Columns\TextColumn::make('status')->label('Status'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\Action::make('export_pdf')
                    ->label('Export PDF')
                    ->icon('heroicon-o-download')
                    ->action(fn () => static::exportReportToPDF()),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function exportReportToPDF()
    {
        $attendances = Attendance::with('staff')->get();

        // Generate PDF
        $pdf = Pdf::loadView('attendance.report', compact('attendances'));

        return response()->streamDownload(
            fn () => print($pdf->output()),
            'attendance_report.pdf'
        );
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReports::route('/'),
        ];
    }
}
