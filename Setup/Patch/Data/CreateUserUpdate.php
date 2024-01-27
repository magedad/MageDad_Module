<?php

declare(strict_types=1);

namespace MageDad\Module\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\User\Model\UserFactory;

class CreateUserUpdate implements DataPatchInterface
{
    public function __construct(
        private UserFactory $userFactory,
    ) {
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $adminInfo = [
            'username'  => 'johndoe',
            'firstname' => 'John',
            'lastname'    => 'Doe',
            'email'     => 'johndoe@johndoe.com',
            'password'  =>'johndoe@123',
            'interface_locale' => 'en_US',
            'is_active' => 1
        ];

        $userModel = $this->userFactory->create();
        $userModel->setData($adminInfo);
        $userModel->setRoleId(1);
        $userModel->save();

        $userModel = $this->userFactory->create()->loadByUsername('johndoe');
        $userModel->setFirstname("Johnny");
        $userModel->save();
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}
