<?php

namespace App\Imports;

use App\WhatsAppBlastMessage;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;

class WhatsAppBlastImport implements ToCollection
{
    protected $message, $document, $fileType;

    public function __construct($message, $document, $fileType, $file) {
        $this->message  = $message;
        $this->document = $document;
        $this->fileType = $fileType;
        $this->file     = $file;
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $row)
        {
            if ($key > 0) {
                if ($row[0] != null) {
                    // Initialize
                    $whatsAppNumber = str_replace(['-','+'],['',''],$row[1]);
                    $imgPath        = null;
                    $fileExt        = null;
                    $originalName   = null;
                    $isDocument     = null;
                    $mimeType       = null;
                    $fileSize       = null;

                    if ($this->file) {
                        // Initialize
                        $imgFile        = $this->file;
                        $fileExt        = $imgFile->getClientOriginalExtension();
                        $originalName   = $imgFile->getClientOriginalName();
                        $mimeType       = $imgFile->getMimeType();
                        $fileSize       = $imgFile->getSize();
                        $imgPath        = $imgFile->store('uploads/whatsapp-blast/file', 'public');
                        $isDocument     = ($this->fileType == 2) ? 1 : 0;
                    }

                    $createData = WhatsAppBlastMessage::create([
                        'country_code'    => $row[0],
                        'whatsapp_number' => $whatsAppNumber,
                        'message'         => $this->message,
                        'status'          => 0,
                        'path'            => $imgPath,
                        'file_ext'        => $fileExt,
                        'file_type'       => $this->fileType,
                        'file_name'       => $originalName,
                        'is_document'     => $isDocument,
                        'mime_type'       => $mimeType,
                        'file_size'       => $fileSize
                    ]);
                }
            }
        }
    }
}
