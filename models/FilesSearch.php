<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Files;
use app\models\User;
use app\models\Sabject;

/**
 * FilesSearch represents the model behind the search form about `app\models\Files`.
 */
class FilesSearch extends Files
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'size', 'visable_type'], 'integer'],
            [['name', 'path', 'description', 'password', 'first_name','last_name', 'department_name', 'faculty_name', 'subject_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Files::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        $query->joinWith('user');
        $query->joinWith('user.department');
        $query->joinWith('user.department.faculty');
        $query->joinWith('subject');
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'size' => $this->size,
            'visable_type' => $this->visable_type,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'path', $this->path])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'user.first_name', $this->first_name])
            ->andFilterWhere(['like', 'department.department_name', $this->department_name])
            ->andFilterWhere(['like', 'faculty.faculty_name', $this->faculty_name])
            ->andFilterWhere(['like', 'subject.subject_name', $this->subject_name])
            ->andFilterWhere(['like', 'user.last_name', $this->last_name]);

        return $dataProvider;
    }
}
