<?php

/**
 * Group permissions class, handles user group permissions.
 *
 * @package zpanelx
 * @subpackage dryden -> controller
 * @version 1.0.0
 * @author ballen (ballen@zpanelcp.com)
 */
class ctrl_groups {

    /**
     * Checks permissions to a module for a given user group.
     * @param int $groupid The usergroup ID.
     * @param int $moduleid The module ID.
     * @return bool
     */
    static function CheckGroupModulePermissions($groupid, $moduleid) {
        $rows = $zdbh->query("SELECT pe_id_pk FROM x_permissions WHERE pe_group_fk=$groupid AND pe_module_fk=$moduleid")->fetch();
        if ($rows)
            return true;
        return false;
    }

    /**
     * Adds permission to enable a module for a given user group.
     * @param int $groupid The usergroup ID.
     * @param int $moduleid The module ID.
     * @return bool
     */
    static function AddGroupModulePermissions($groupid, $moduleid) {
        global $zdbh;
        $zdbh = new db_driver("mysql");
        $statment = "INSERT INTO x_permissions (pe_group_fk, pe_module_fk) VALUES ($groupid, $moduleid)";
        if ($zdbh->exec($statement) > 0)
            return true;
        return false;
    }

    /**
     * Deletes permission to disable a module for a given user group.
     * @param int $groupid The usergroup ID.
     * @param int $moduleid The module ID.
     * @return bool
     */
    static function DeleteGroupModulePermissions($groupid, $moduleid) {
        global $zdbh;
        $zdbh = new db_driver("mysql");
        $statment = "DELETE FROM x_permissions WHERE pe_group_fk=$groupid AND pe_module_fk=$moduleid)";
        if ($zdbh->exec($statement) > 0)
            return true;
        return false;
        ;
    }

}

?>
