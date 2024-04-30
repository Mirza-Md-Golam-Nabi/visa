<?php

namespace App\Services\LegalDocument;

use App\Models\LegalDocument;

class LegalDocumentService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store(array $data): object
    {
        return LegalDocument::create($data);
    }

    public function update(array $data, int $personal_id): object
    {
        return LegalDocument::updateOrCreate(['personal_info_id' => $personal_id], $data);
    }

    public function softDelete(int $personal_id): bool
    {
        $legal_document = LegalDocument::where('personal_info_id', $personal_id)->first();

        if ($legal_document) {
            return $legal_document->delete();
        }

        return false;
    }
}
