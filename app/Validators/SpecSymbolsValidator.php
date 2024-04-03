<?php
namespace Validators;
use Src\Validator\AbstractValidator;
class SpecSymbolsValidator extends AbstractValidator
{
    protected string $message = 'Field :field cannot contain special characters';
    public function rule(): bool
    {
        $symbols = '!@#$%^&*()_+}{":?><';
        if(preg_match('/['.$symbols.']/', $this->value)){
            return false;
        }
        return true;
    }
}