<?php

defined('_JEXEC') or die();

class pkg_DumpInstallerScript
{
	/**
	 * Constructor
	 *
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 */
	public function __construct(JAdapterInstance $adapter)
	{
		return true;
	}

	/**
	 * Called before any type of action
	 *
	 * @param   string  $route  Which action is happening (install|uninstall|discover_install|update)
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function preflight($route, JAdapterInstance $adapter)
	{
		return true;
	}

	/**
	 * Called after any type of action
	 *
	 * @param   string  $route  Which action is happening (install|uninstall|discover_install|update)
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function postflight($route, JAdapterInstance $adapter)
	{
		return true;
	}

	/**
	 * Called on installation
	 *
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function install(JAdapterInstance $adapter)
	{
		$this->_publishPlugin($plg_name = 'dump', $plg_type = 'system', $plg_full_name = null);
		return true;
	}

	/**
	 * Publishes a plugin
	 *
	 * @param   string  $plg_name       Plugin name, like notificationary
	 * @param   string  $plg_type       Plugin group, like system
	 * @param   string  $plg_full_name  Plugin full name, like olg_system_notificationary
	 *
	 * @return   void
	 */
	private function _publishPlugin($plg_name,$plg_type, $plg_full_name = null)
	{
		$plugin = JPluginHelper::getPlugin($plg_type, $plg_name);
		$success = true;

		if (empty($plugin))
		{
			// Get the smallest order value
			$db = jfactory::getdbo();

			// Publish plugin
			$query = $db->getquery(true);

			// Fields to update.
			$fields = array(
				$db->quotename('enabled') . '=' . $db->quote('1')
			);

			// Conditions for which records should be updated.
			$conditions = array(
				$db->quotename('type') . '=' . $db->quote('plugin'),
				$db->quotename('folder') . '=' . $db->quote($plg_type),
				$db->quotename('element') . '=' . $db->quote($plg_name),
			);
			$query->update($db->quotename('#__extensions'))->set($fields)->where($conditions);
			$db->setquery($query);
			$result = $db->execute();
			$getaffectedrows = $db->getAffectedRows();
			$success = $getaffectedrows;
		}

		if (empty($plg_full_name))
		{
			$plg_full_name = $plg_name;
		}

		$msg = jtext::_('jglobal_fieldset_publishing') . ': <b style="color:blue;"> ' . JText::_($plg_full_name) . '</b> ... ';

		if ($success)
		{
			$msg .= '<b style="color:green">' . jtext::_('jpublished') . '</b>';
		}
		else
		{
			$msg .= '<b style="color:red">' . jtext::_('error') . '</b>';
		}

		$this->messages[] = $msg;
	}
	/**
	 * Called on update
	 *
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function update(JAdapterInstance $adapter)
	{
		return true;
	}

	/**
	 * Called on uninstallation
	 *
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 */
	public function uninstall(JAdapterInstance $adapter)
	{
		return true;
	}
}
