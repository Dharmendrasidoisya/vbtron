<?php

namespace Botble\Career\Listeners;

use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\MetaBox;
use Exception;

class DeletedContentListener
{
    public function handle(DeletedContentEvent $event): void
    {
        try {
            MetaBox::deleteMetaData($event->data, 'Career_schema_config');
        } catch (Exception $exception) {
            BaseHelper::logError($exception);
        }
    }
}
