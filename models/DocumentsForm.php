<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class DocumentsForm extends Model{
    public $facult;
    public $department;
    public $predmet;

    public function attributeLabels()
    {
        return [
            'facult' => 'Факультет',
            'department' => 'Специальность',
            'predmet' => 'Предмет',
        ];
    }

    public function rules()
    {
        return [];
    }
    public function search($params)
    {
        $query = Files::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

//        if (!$this->validate()) {
//            // uncomment the following line if you do not want to return any records when validation fails
//            // $query->where('0=1');
//            return $dataProvider;
//        }

//        $query->andFilterWhere([
//            'facult' => $this->facult,
//            'department' => $this->department,
//            'predmet' => $this->visable_type,
//        ]);

        return $dataProvider;
    }

}