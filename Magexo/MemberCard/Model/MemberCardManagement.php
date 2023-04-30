<?php
/**
 * Created: 27/04/2023
 * Author: Peter Bartoš, pbartos3@icloud.com
 */
declare(strict_types=1);

namespace Magexo\MemberCard\Model;

class MemberCardManagement implements \Magexo\MemberCard\Api\MemberCardManagementInterface
{

    /**
     * {@inheritdoc}
     */
    public function getMemberCard($param)
    {
        return 'hello api GET return the $param ' . $param;
    }
}

