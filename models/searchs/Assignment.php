<?php

namespace ekalokman\AdminPgsql\models\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\ImoHelper;
use yii\db\Query;
/**
 * AssignmentSearch represents the model behind the search form about Assignment.
 * 
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class Assignment extends Model
{
    public $id;
    public $username;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'username'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('rbac-admin', 'ID'),
            'username' => Yii::t('rbac-admin', 'Username'),
            'name' => Yii::t('rbac-admin', 'Name'),
        ];
    }

    /**
     * Create data provider for Assignment model.
     * @param  array                        $params
     * @param  \yii\db\ActiveRecord         $class
     * @param  string                       $usernameField
     * @return \yii\data\ActiveDataProvider
     */
    public function search($params, $class, $usernameField)
    {
        $query = $class::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', $usernameField, $this->username]);

        return $dataProvider;
    }
    public function searchbykcd($params, $class, $usernameField)
    {   

        $userDetail=ImoHelper::getkcd();
        $email=$userDetail->email;
        $kcdio=$userDetail->acadkuly;
        $dept_code=$userDetail->dept_code;

        // $query = $class::find();

        $query = new Query;

       
            $query->select('quest.qst_sp_user.*,');
            $query->from('quest.qst_sp_user');
            // $query->where( ['UIA.V_QST_SUPERVISOR_APPOINTMENT.SUPERVISION_CODE' => 'S']);
            // $query->where(['in', 'UIA.V_QST_SUPERVISOR_APPOINTMENT.SUPERVISION_CODE', ['S','SS']  ]);
            $query->join('inner join', 'admin.staffinfo_vw',"quest.qst_sp_user.username=admin.staffinfo_vw.username and admin.staffinfo_vw.dept_code='$dept_code'",false);

            $query->orderBy([
              'quest.qst_sp_user.username' => SORT_ASC,
              // 'UIA.STUDENT_ST.STATUS' => SORT_DESC

            ]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'quest.qst_sp_user.'.$usernameField, strtolower($this->username)]);
        //$query->andFilterWhere(['like', $usernameField, strtolower($this->username)]);

        return $dataProvider;
    }
}
