<?php
/**
 * Created: 27/04/2023
 * Author: Peter Bartoš, pbartos3@icloud.com
 */
declare(strict_types=1);

namespace Magexo\MemberCard\Api;

interface MemberCardManagementInterface
{

    /**
     * GET for MemberCard api
     * @param string $param
     * @return string
     */
    public function getMemberCard($param);
}

