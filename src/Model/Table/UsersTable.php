<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
	/**
	 * Initialize method
	 *
	 * @param array $config The configuration for the Table.
	 * @return void
	 */
	public function initialize(array $config): void
	{
		parent::initialize($config);

		$this->setTable('users');
		$this->setDisplayField('id');
		$this->setPrimaryKey('id');
		// ファイルアップロード用
		$this->addBehavior('ContentsFile.ContentsFile');
		$this->addBehavior('Timestamp');

		$this->hasMany('Posts');
	}

	/**
	 * Default validation rules.
	 *
	 * @param \Cake\Validation\Validator $validator Validator instance.
	 * @return \Cake\Validation\Validator
	 */
	public function validationDefault(Validator $validator): Validator
	{
		$validator
			->integer('id')
			->allowEmptyString('id', null, 'create');

		$validator
			->scalar('username')
			->maxLength('username', 255)
			->requirePresence('username', 'create')
			->notEmptyString('username');

		$validator
			->email('email')
			->requirePresence('email', 'create')
			->notEmptyString('email');

		$validator
			->scalar('password')
			->maxLength('password', 255)
			->requirePresence('password', 'create')
			->notEmptyString('password');

		// ファイルアップロード用
		// providerを読み込み
		$validator->setProvider('contents_file', 'ContentsFile\Validation\ContentsFileValidation');
		$validator
			->notEmpty('img', 'ファイルを添付してください', function ($context) {
				// fileValidationWhenメソッドを追加しました。
				return $this->fileValidationWhen($context, 'img');
			})
			->add('img', 'uploadMaxSizeCheck', [
				'rule' => 'uploadMaxSizeCheck',
				'provider' => 'contents_file',
				'message' => 'ファイルアップロード容量オーバーです',
				'last' => true,
			])
			->add('img', 'checkMaxSize', [
				'rule' => ['checkMaxSize', '512M'],
				'provider' => 'contents_file',
				'message' => 'ファイルアップロード容量オーバーです',
				'last' => true,
			])
			->add('img', 'extension', [
				'rule' => ['extension', ['jpg', 'jpeg', 'gif', 'png',]],
				'message' => '画像のみを添付して下さい',
				'last' => true,
			]);

		return $validator;
	}

	/**
	 * Returns a rules checker object that will be used for validating
	 * application integrity.
	 *
	 * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
	 * @return \Cake\ORM\RulesChecker
	 */
	public function buildRules(RulesChecker $rules): RulesChecker
	{
		$rules->add($rules->isUnique(['username']), ['errorField' => 'username']);
		$rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

		return $rules;
	}
}
