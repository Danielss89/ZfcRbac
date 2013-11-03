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

return array(
    'service_manager' => array(
        'factories' => array(
            'ZfcRbac\Guard\ControllerGuard'                   => 'ZfcRbac\Factory\ControllerGuardFactory',
            'ZfcRbac\Guard\RouteGuard'                        => 'ZfcRbac\Factory\RouteGuardFactory',
            'ZfcRbac\Identity\AuthenticationIdentityProvider' => 'ZfcRbac\Factory\AuthenticationIdentityProviderFactory',
            'ZfcRbac\Options\ModuleOptions'                   => 'ZfcRbac\Factory\ModuleOptionsFactory',
            'ZfcRbac\Service\AuthorizationService'            => 'ZfcRbac\Factory\AuthorizationServiceFactory'
        )
    ),

    'view_helpers' => array(
        'factories' => array(
            'ZfcRbac\View\Helper\IsGranted' => 'ZfcRbac\Factory\IsGrantedViewHelperFactory'
        ),
        'aliases' => array(
            'IsGranted' => 'ZfcRbac\View\Helper\IsGranted'
        )
    ),

    'controller_plugins' => array(
        'factories' => array(
            'ZfcRbac\Mvc\Controller\Plugin\IsGranted' => 'ZfcRbac\Factory\IsGrantedPluginFactory'
        ),
        'aliases' => array(
            'IsGranted' => 'ZfcRbac\Mvc\Controller\Plugin\IsGranted'
        )
    ),

    'zfc_rbac' => array(
        // Identity provider service key
        'identity_provider' => 'ZfcRbac\Identity\AuthenticationIdentityProvider',

        // Don't create missing roles in the Rbac container by default
        'create_missing_roles' => false,

        // Guest role
        'guest_role' => 'guest',

        // Default role
        'default_role' => 'member',

        // Guards options
        'guards' => array()
    )
);