<?php

namespace SpiffySecurity\Firewall;

use SpiffySecurity\Identity\IdentityInterface;

class Route extends AbstractFirewall
{
    /**
     * @var array
     */
    protected $rules = array();

    /**
     * @var string
     */
    protected $ruleRegex;

    /**
     * @param array $rules
     */
    public function __construct(array $rules)
    {
        $regex = array();
        foreach($rules as $key => $rule) {
            if (!is_array($rule['roles'])) {
                $rule['roles'] = array($rule['roles']);
            }
            $this->rules[] = $rule['roles'];

            $regex[] = str_replace('/', '\/', '(' . $rule['route'] . ')');
        }

        $this->ruleRegex = sprintf('/%s/', implode('|', $regex));
    }

    /**
     * Checks if access is granted to resource for the role.
     *
     * @param \SpiffySecurity\Identity\IdentityInterface $identity
     * @param string $resource
     * @return bool
     */
    public function isAllowed(IdentityInterface $identity, $resource)
    {
        // No rules, automatically allow
        if (empty($this->rules)) {
            return true;
        }

        // If no rule exists for this resource allow it.
        $result = (bool) preg_match($this->ruleRegex, $resource, $matches);
        if (false === $result) {
            return true;
        }

        // This is either slick, or stupid.
        // Take the matches, find the first non-empty string (excluding the start), and use that as the
        // key to find the proper role list.
        $roles = array();
        foreach($matches as $key => $value) {
            if ($key === 0) {
                continue;
            }
            if ($value !== '') {
                $roles = $this->rules[$key-1];
            }
        }

        foreach($roles as $role) {
            foreach($identity->getRoles() as $urole) {
                if ($role == $urole || $this->securityService->getAcl()->inheritsRole($urole, $role)) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Get the firewall name.
     *
     * @return string
     */
    public function getName()
    {
        return 'route';
    }
}
