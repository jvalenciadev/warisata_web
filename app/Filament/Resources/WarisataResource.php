<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WarisataResource\Pages;
use App\Filament\Resources\WarisataResource\RelationManagers;
use App\Models\Warisata;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WarisataResource extends Resource
{
    protected static ?string $model = Warisata::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Warisata Management';
    protected static ?string $navigationLabel = 'Warisata';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Textarea::make('descripcion')
                    ->rows(3),
                Forms\Components\Textarea::make('mision')
                    ->rows(3),
                Forms\Components\Textarea::make('vision')
                    ->rows(3),
                Forms\Components\FileUpload::make('logo')
                    ->image()
                    ->directory('logos_warisata')
                    ->maxSize(1024)
                    ->nullable()
                    ->imagePreviewHeight('150')
                    ->preserveFilenames()
                    ->enableDownload()
                    ->enableOpen()
                    ->visibility('public'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_warisata')->sortable(),
                Tables\Columns\TextColumn::make('nombre')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('descripcion')->limit(50),
                Tables\Columns\ImageColumn::make('logo')->disk('public'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListWarisatas::route('/'),
            'create' => Pages\CreateWarisata::route('/create'),
            'edit' => Pages\EditWarisata::route('/{record}/edit'),
        ];
    }
}
