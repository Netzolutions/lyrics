<?php

namespace Netscript\Lyrics\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Markus Pircher <markus.pircher@netzolutions.eu>, netzolutions OHG
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \Netscript\Lyrics\Domain\Model\Lyrics.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Markus Pircher <markus.pircher@netzolutions.eu>
 */
class LyricsTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Netscript\Lyrics\Domain\Model\Lyrics
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Netscript\Lyrics\Domain\Model\Lyrics();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitelReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTitel()
		);
	}

	/**
	 * @test
	 */
	public function setTitelForStringSetsTitel() {
		$this->subject->setTitel('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'titel',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTextReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getText()
		);
	}

	/**
	 * @test
	 */
	public function setTextForStringSetsText() {
		$this->subject->setText('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'text',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getVlabelReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getVlabel()
		);
	}

	/**
	 * @test
	 */
	public function setVlabelForStringSetsVlabel() {
		$this->subject->setVlabel('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'vlabel',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAuthorReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getAuthor()
		);
	}

	/**
	 * @test
	 */
	public function setAuthorForStringSetsAuthor() {
		$this->subject->setAuthor('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'author',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getComposerReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getComposer()
		);
	}

	/**
	 * @test
	 */
	public function setComposerForStringSetsComposer() {
		$this->subject->setComposer('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'composer',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTimeReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTime()
		);
	}

	/**
	 * @test
	 */
	public function setTimeForStringSetsTime() {
		$this->subject->setTime('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'time',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getHasTranslationReturnsInitialValueForBoolean() {
		$this->assertSame(
			FALSE,
			$this->subject->getHasTranslation()
		);
	}

	/**
	 * @test
	 */
	public function setHasTranslationForBooleanSetsHasTranslation() {
		$this->subject->setHasTranslation(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'hasTranslation',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTranslatedTitleReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTranslatedTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTranslatedTitleForStringSetsTranslatedTitle() {
		$this->subject->setTranslatedTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'translatedTitle',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTranslatedTextReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTranslatedText()
		);
	}

	/**
	 * @test
	 */
	public function setTranslatedTextForStringSetsTranslatedText() {
		$this->subject->setTranslatedText('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'translatedText',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTranslatorReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTranslator()
		);
	}

	/**
	 * @test
	 */
	public function setTranslatorForStringSetsTranslator() {
		$this->subject->setTranslator('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'translator',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getArtistReturnsInitialValueForArtists() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getArtist()
		);
	}

	/**
	 * @test
	 */
	public function setArtistForObjectStorageContainingArtistsSetsArtist() {
		$artist = new \Netscript\Lyrics\Domain\Model\Artists();
		$objectStorageHoldingExactlyOneArtist = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneArtist->attach($artist);
		$this->subject->setArtist($objectStorageHoldingExactlyOneArtist);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneArtist,
			'artist',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addArtistToObjectStorageHoldingArtist() {
		$artist = new \Netscript\Lyrics\Domain\Model\Artists();
		$artistObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$artistObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($artist));
		$this->inject($this->subject, 'artist', $artistObjectStorageMock);

		$this->subject->addArtist($artist);
	}

	/**
	 * @test
	 */
	public function removeArtistFromObjectStorageHoldingArtist() {
		$artist = new \Netscript\Lyrics\Domain\Model\Artists();
		$artistObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$artistObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($artist));
		$this->inject($this->subject, 'artist', $artistObjectStorageMock);

		$this->subject->removeArtist($artist);

	}
}
