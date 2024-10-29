<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParentModelResource\Pages;
use App\Filament\Resources\ParentModelResource\RelationManagers;
use App\Models\ParentModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ParentModelResource extends Resource
{
    protected static ?string $model = ParentModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Forms\Components\Select::make('student_id')
                ->relationship('student', 'full_name')
                ->required(),
            Forms\Components\TextInput::make('full_name')
                ->required()
                ->maxLength(100),
            Forms\Components\TextInput::make('phone')
                ->maxLength(15),
            Forms\Components\TextInput::make('job')
                ->maxLength(100),
            Forms\Components\Textarea::make('address'),
            Forms\Components\Select::make('relationship')
                ->options([
                    'father' => 'Father',
                    'mother' => 'Mother',
                    'guardian' => 'Guardian',
                ])
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.full_name')->label('Student Name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('full_name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('phone'),
            Tables\Columns\TextColumn::make('job'),
            Tables\Columns\TextColumn::make('relationship'),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListParentModels::route('/'),
            'create' => Pages\CreateParentModel::route('/create'),
            'edit' => Pages\EditParentModel::route('/{record}/edit'),
        ];
    }
}
