<?php

declare(strict_types=1);

namespace MageDad\Module\Logger;

use Magento\Framework\Filesystem\DriverInterface;
use Magento\Framework\Logger\Handler\Base as HandlerBase;

class Handler extends HandlerBase
{
    public const LOG_DIRECTORY_PATH = 'var/log/custom/';

    /**
     *
     * @param null $filePath
     */
    public function __construct(
        DriverInterface $filesystem,
        $filePath = null,
    ) {
        $fileName = \sprintf(self::LOG_DIRECTORY_PATH . '%s.log', \date('d-m-Y'));

        parent::__construct($filesystem, $filePath, $fileName);
    }
}
