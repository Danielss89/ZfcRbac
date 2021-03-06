<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace ZfcRbac\Permission;

use ZfcRbac\Service\RbacEvent;

/**
 * A permission provider is an object that returns a list of permissions
 *
 * Permission providers must follow a specific format when returning roles. Supported formats are as below:
 *
 *      - an array of PermissionInterface instances (starting from ZF 2.3)
 *      - an array that map a permission to a single role (eg.: array("permissionName" => "role"))
 *      - an array that map a permission to multiple roles (eg.: array("permissionName" => array("role1", "role2"))
 */
interface PermissionProviderInterface
{
    /**
     * Get the permissions from the provider
     *
     * @param  RbacEvent $event
     * @return array|PermissionInterface[]
     */
    public function getPermissions(RbacEvent $event);
}
