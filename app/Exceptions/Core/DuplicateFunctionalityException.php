<?php

declare(strict_types=1);

namespace App\Exceptions\Core;

use App\Core\Abstracts\BaseException;

class DuplicateFunctionalityException extends BaseException {
    public function __construct(string $exceptionType, string $functionalityName, string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        switch($exceptionType){
            case "model":
                $this->message = "Unable to load model {$functionalityName}. Model with this name has been already loaded. Possible model name conflict.";
                break;
            case "module":
                $this->message = "Unable to load module {$functionalityName}. Module with this name has been already loaded. Possible module name conflict.";
                break;
            case "extension":
                $this->message = "Unable to load extension {$functionalityName}. Extension with this name has been already loaded. Possible extension name conflict.";
                break;
        }
    }
}