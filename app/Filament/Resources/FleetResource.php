<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FleetResource\Pages;
use App\Filament\Resources\FleetResource\RelationManagers;
use App\Models\Car;
use App\Models\Fleet;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FleetResource extends Resource
{
    protected static ?string $model = Fleet::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                TextInput::make('title')->label('Name')->required(),
                TextInput::make('address')->required(),
                TextInput::make('schedule'),
            ])->inlineLabel();
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Name')->sortable(),
                TextColumn::make('address')->sortable(),
                TextColumn::make('schedule')->sortable(),
                TextColumn::make('cars.number')->label('Машины'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\CarsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFleets::route('/'),
            'create' => Pages\CreateFleet::route('/create'),
            'edit' => Pages\EditFleet::route('/{record}/edit'),
        ];
    }

    public static function beforeSave($record): void
    {
        $carsData = request()->input('cars', []);

        foreach ($carsData as $carData) {
            // Проверяем, есть ли уже такая машина
            $car = Car::where('number', $carData['number'])->first();

            if ($car) {
                // Обновляем имя водителя, если оно изменилось
                if ($car->driver_name !== $carData['driver_name']) {
                    $car->update(['driver_name' => $carData['driver_name']]);
                }
            } else {
                // Если машины нет, создаем новую
                $car = Car::create([
                    'number' => $carData['number'],
                    'driver_name' => $carData['driver_name'],
                ]);
            }

            $record->cars()->syncWithoutDetaching([$car->id]);
        }
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->hasRole('Manager');
    }

    public static function canCreate(): bool
    {
        return auth()->user()->hasRole('Manager');
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()->hasRole('Manager');
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()->hasRole('Manager');
    }

}
