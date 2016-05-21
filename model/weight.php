<?php
class Model_weight extends Base_model
{

	/**
	 * 按日期分组
	 */
	public function getWeightData($uid, array $limit = []) {
		$sql = "SELECT * FROM weight WHERE uid = ?i ORDER BY `date` ASC";
		$sql = prepare($sql, [$uid]);
		if(!empty($limit)) {
			$offset = $limit[0] - 1;
			$row    = $limit[1];
			$sql .= " LIMIT {$offset}, $row";
		}
		$result = get_data($sql);
		$result = $result == false ? [] : $result;
		return $result;
	}

	public function setWeightData(array $data) {
		$sql = "INSERT INTO weight (id, uid, weight, pic, `date`) VALUES('', ?i, ?s, '', ?s)";
		$sql = prepare($sql, [$data['uid'], $data['weight'], $data['date']]);
		return run_sql($sql);
	}

	/**
	 * 将取出的体重信息按日期分组
	 */
	public function parseWeightForDate($uid) {
		$data = $this->getWeightData($uid);
		$returnData = [];
		foreach($data as $ls) {
			$date = date('Ymd', $ls['date']);
			if(!isset($returnData[$date])) {
				$returnData[$date] = [];
			}
			$returnData[$date][] = $ls;
		}
		return $returnData;
	}
	/**
	 * 类的元数据对象
     *
     * @static
     */
    static function meta()
    {
        return self::instance(__CLASS__);
    }
}

