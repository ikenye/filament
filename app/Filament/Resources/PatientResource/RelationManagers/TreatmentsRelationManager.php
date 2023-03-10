<?php

namespace App\Filament\Resources\PatientResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class TreatmentsRelationManager extends RelationManager
{
    protected static string $relationship = 'treatments';

    protected static ?string $recordTitleAttribute = 'description';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Textarea::make('notes')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->numeric()
                    ->prefix('BWP')
                    ->maxValue(42949672.95),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('description'),
                TextColumn::make('price')
                    ->money('bwp', true)
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
