<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'image_path',
        'logo_path',
        'creation_year',
        'description',
        'domain',
        'cost_from',
        'cost_to',
        'archived',
    ];

    // Media collection name for the gallery
    private $galleryMediaCollection = 'gallery';

    // Определение отношения многие-ко-многим с моделью Tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // Function to set up media collections
    public function registerMediaCollections(): void
    {
        // Main image of the project
        $this->addMediaCollection('mainImage')
            ->singleFile();

        // Gallery images of the project
        $this->addMediaCollection($this->galleryMediaCollection)
            ->useDisk('public')
            ->withResponsiveImages();
    }

    // Function to add multiple images to the gallery
    public function addGalleryMedia(array $images): void
    {
        foreach ($images as $image) {
            $this->addMedia($image)->toMediaCollection($this->galleryMediaCollection);
        }
    }

    // Function to remove media from the gallery
    public function removeGalleryMedia(array $mediaIds): void
    {
        $this->media()
            ->whereIn('id', $mediaIds)
            ->delete();
    }
}
