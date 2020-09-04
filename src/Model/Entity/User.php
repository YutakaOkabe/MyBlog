<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

// ファイルアップロード用
use ContentsFile\Model\Entity\ContentsFileTrait;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class User extends Entity
{
	// ファイルアップロード用
	use ContentsFileTrait;

	public $contentsFileConfig = [
		'fields' => [
			// 使用したいフィールドを設定
			'file' => [
				'resize' => false,
			],
			'img' => [
				'resize' => [
					// 画像のリサイズが必要な場合
					['width' => 300],
					['width' => 300, 'height' => 400],
					// typeには
					// normal(default) 長い方を基準に画像をリサイズする
					// normal_s 短い方を基準に画像をリサイズする
					// scoop 短い方を基準に画像をリサイズし、中央でくりぬきする
					['width' => 300, 'height' => 400, 'type' => 'scoop'],
				],
			],
		],
	];

	/**
	 * Fields that can be mass assigned using newEntity() or patchEntity().
	 *
	 * Note that when '*' is set to true, this allows all unspecified fields to
	 * be mass assigned. For security purposes, it is advised to set '*' to false
	 * (or remove it), and explicitly make individual fields accessible as needed.
	 *
	 * @var array
	 */
	protected $_accessible = [
		'*' => true,
		'username' => true,
		'email' => true,
		'password' => true,
		'created' => true,
		'modified' => true,
	];

	/**
	 * Fields that are excluded from JSON versions of the entity.
	 *
	 * @var array
	 */
	protected $_hidden = [
		'password',
	];

	// ファイルアップロード用
	//&getメソッドをoverride
	public function &get($property)
	{
		$value = parent::get($property);
		$value = $this->getContentsFile($property, $value);
		return $value;
	}

	//setメソッドをoverride
	public function set($property, $value = null, array $options = [])
	{
		parent::set($property, $value, $options);
		$this->setContentsFile();
		return $this;
	}


	// パスワード保護
	protected function _setPassword(string $password): ?string
	{
		if (strlen($password) > 0) {
			return (new DefaultPasswordHasher())->hash($password);
		}
	}
}
