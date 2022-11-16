<?php
namespace App\config\Processor;

interface IProcessor
{
    public function __construct(string $value);

    public function canBeProcessed(): bool;

    public function execute();
}