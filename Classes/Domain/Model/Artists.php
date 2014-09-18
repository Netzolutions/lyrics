<?php
namespace Netscript\Lyrics\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Markus Pircher <markus.pircher@netzolutions.eu>, netzolutions OHG
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Artist
 */
class Artists extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Name
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name = '';

	/**
	 * Is active
	 *
	 * @var string
	 */
	protected $description = '';

	/**
	 * Is active
	 *
	 * @var string
	 */
	protected $biographie = '';

	/**
	 * Is active
	 *
	 * @var boolean
	 */
	protected $isActive = FALSE;

	/**
	 * Returns the name
	 *
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the biographie
	 *
	 * @return string $biographie
	 */
	public function getBiographie() {
		return $this->biographie;
	}

	/**
	 * Sets the biographie
	 *
	 * @param string $biographie
	 * @return void
	 */
	public function setBiographie($biographie) {
		$this->biographie = $biographie;
	}

	/**
	 * Returns the isActive
	 *
	 * @return boolean $isActive
	 */
	public function getIsActive() {
		return $this->isActive;
	}

	/**
	 * Sets the isActive
	 *
	 * @param boolean $isActive
	 * @return void
	 */
	public function setIsActive($isActive) {
		$this->isActive = $isActive;
	}

	/**
	 * Returns the boolean state of isActive
	 *
	 * @return boolean
	 */
	public function isIsActive() {
		return $this->isActive;
	}

}