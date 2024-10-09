<?php
namespace rivcar\jqGrid;
use PDO;

${"GLOBALS"}["olgyyghcj"]="pkey_column_name";${"GLOBALS"}["neuucnrebf"]="pkey_key_seq";${"GLOBALS"}["wcczlytlfqwg"]="primaryKeysResult";${"GLOBALS"}["wmzediu"]="tableOwner";${"GLOBALS"}["jmonviyu"]="nullable";${"GLOBALS"}["acoujrpky"]="type_name";${"GLOBALS"}["cnlqwmcgul"]="table_name";${"GLOBALS"}["kcfomhcttn"]="result";${"GLOBALS"}["dvifpbhwqt"]="row";${"GLOBALS"}["ssgpxly"]="stmt";${"GLOBALS"}["sbhcybb"]="schemaName";${"GLOBALS"}["rwthfv"]="pos";${"GLOBALS"}["sdrpggwsple"]="res";${"GLOBALS"}["uuexsogf"]="rs";${"GLOBALS"}["czkemhrt"]="table";
${"GLOBALS"}["vcwsuphnbfx"]="index";${"GLOBALS"}["xtedsueqf"]="old";
${"GLOBALS"}["uiclphu"]="ret";
${"GLOBALS"}["mpbqyvfkuy"]="fetchall";
${"GLOBALS"}["cgtadbksjf"]="dbtype";${"GLOBALS"}["zzhxvmewbbb"]="key";${"GLOBALS"}["xmptkuizrczf"]="types";${"GLOBALS"}["effpknwir"]="field";${"GLOBALS"}["iadcxqaszl"]="conn";
${"GLOBALS"}["soqwzoem"]="offsetStr";${"GLOBALS"}["igknlncqiy"]="limitStr";
${"GLOBALS"}["dtvcoictk"]="i";${"GLOBALS"}["ealxejk"]="v";${"GLOBALS"}["jdpzykudxvcv"]="k";${"GLOBALS"}["cduutnxxb"]="params";
${"GLOBALS"}["jrddlwpdvr"]="bind";${"GLOBALS"}["llllcuc"]="sqlElement";
class jqGridDB
{
	public static function getInterface()
	{
		return "pdo";
	}
	public static function prepare($conn,$sqlElement,$params,$bind=true)
	{
		$dvspemwkjx="conn";$jfxpzro="sqlElement";
		if(${$dvspemwkjx}&&strlen(${$jfxpzro})>0)
		{
			${"GLOBALS"}["xmfkolsesoan"]="sql";
			${${"GLOBALS"}["xmfkolsesoan"]}=$conn->prepare((string)${${"GLOBALS"}["llllcuc"]});if(!${${"GLOBALS"}["jrddlwpdvr"]}){return$sql;}${"GLOBALS"}["abacnunig"]="sql";if(is_array(${${"GLOBALS"}["cduutnxxb"]})){${"GLOBALS"}["prkjxlqppoq"]="params";if(0!==count(array_diff_key(${${"GLOBALS"}["cduutnxxb"]},array_keys(array_keys(${${"GLOBALS"}["prkjxlqppoq"]}))))){foreach(${${"GLOBALS"}["cduutnxxb"]} as${${"GLOBALS"}["jdpzykudxvcv"]}=>${${"GLOBALS"}["ealxejk"]}){if(${${"GLOBALS"}["ealxejk"]}===NULL){$sql->bindValue(${${"GLOBALS"}["jdpzykudxvcv"]},NULL,PDO::PARAM_NULL);}else{$sql->bindValue(${${"GLOBALS"}["jdpzykudxvcv"]},${${"GLOBALS"}["ealxejk"]});}}}else{$duskjlvle="i";$kfubxblo="i";for(${${"GLOBALS"}["dtvcoictk"]}=1;${$duskjlvle}<=count(${${"GLOBALS"}["cduutnxxb"]});${$kfubxblo}++){$bgcwubqj="params";$xepdznjy="i";if(${$bgcwubqj}[${$xepdznjy}-1]===NULL){$sql->bindValue(${${"GLOBALS"}["dtvcoictk"]},NULL,PDO::PARAM_NULL);}else{$jvptclavuwk="i";$sql->bindValue(${$jvptclavuwk},${${"GLOBALS"}["cduutnxxb"]}[${${"GLOBALS"}["dtvcoictk"]}-1]);}}}}return${${"GLOBALS"}["abacnunig"]};}return false;
	}
	public static function limit($sqlId,$dbtype,$nrows=-1,$offset=-1,$order='',$sort='')
	{
		$yszftiqvruj="offset";
		$kysyzw="offsetStr";
		$iuegwbd="psql";
		$renvubhvgen="offset";
		$psql=$sqlId;
		${"GLOBALS"}["wfvdkp"]="psql";
		$nvrtmijpdu="limitStr";
		$zrtrieye="offsetStr";
		$mbfwlfsnfqm="nrows";
		$idcskk="nrows";
		$nlqsgdlvl="psql";
		$zlqpjgd="offset";
		switch($dbtype)
		{
			case"mysql":
				${$kysyzw}=($offset>=0)?"$offset, ":"";
				if($nrows<0)
				{
					${"GLOBALS"}["xenojqzvud"]="nrows";
					${${"GLOBALS"}["xenojqzvud"]}="184\x34\x36\x374\x34\x30\x37\x33\x370\x395\x35\x31\x361\x35";
				}
				${$iuegwbd}.=" LIMIT $offsetStr$nrows";
				break;
			case"pgsql":
				${$zrtrieye}=($offset>=0)?" OFFSET ".${$zlqpjgd}:"";
				${${"GLOBALS"}["igknlncqiy"]}=(${$idcskk}>=0)?" LIMIT ".${$mbfwlfsnfqm}:"";
				${$nlqsgdlvl}.="$limitStr$offsetStr";
				break;
			case"sqlite":
				${${"GLOBALS"}["soqwzoem"]}=(${$renvubhvgen}>=0)?" OFFSET $offset":"";
				${$nvrtmijpdu}=($nrows>=0)?" LIMIT $nrows":(${$yszftiqvruj}>=0?" LIMIT 9\x39\x39\x39\x3999\x39\x39":"");
				${${"GLOBALS"}["wfvdkp"]}.="$limitStr$offsetStr";
				break;
			case"sqlsrv":
				$nrows=intval($nrows);
				if($nrows<0)
					return false;
				$offset=intval($offset);
				if($offset<0)
					return false;
				if($offset>=0&&$nrows>0)
				{
					if($order&&strlen($order)>0)
					{
						$order=" ORDER BY ".$order." ";
						if($sort)
						{
							$order.=$sort;
						}
					}
					else
					{
						$order="";
					}
					$psql="SELECT z2\x2e*\n\t\t\t\t\t\tFROM (\n\t\t\t\t\t\t\tSELECT z\x31\x2e*, ROW_NUMBER() OVER(".$order.") AS jqgrid_row \n\t\t\t\t\t\t\t\tFROM (\n\t\t\t\t\t\t\t\t\t".$psql."\n\t\t\t\t\t\t\t\t) z1\n\t\t\t\t\t\t) z\x32\n\t\t\t\t\tWHERE z2.jqgrid_row BETWEEN ".($offset+1)." AND ".($offset+$nrows);
				}
				else
					$psql.=strpos(strtoupper($psql),'WHERE')?" and 1=2":" WHERE 1=2";
				break;
			case"oci8":
				$nrows=intval($nrows);
				if($nrows<0)
					return false;
				$offset=intval($offset);
				if($offset<0)
					return false;
				if($offset>=0&&$nrows>0)
				{
					if($order&&strlen($order)>0)
					{
						$order=" ORDER BY ".$order." ";
						if($sort)
						{
							$order.=$sort;
						}
					}
					else
					{
						$order="";
					}
					$psql="SELECT z2\x2e*\n\t\t\t\t\t\tFROM (\n\t\t\t\t\t\t\tSELECT z\x31\x2e*, ROW_NUMBER() OVER(".$order.") AS jqgrid_row \n\t\t\t\t\t\t\t\tFROM (\n\t\t\t\t\t\t\t\t\t".$psql."\n\t\t\t\t\t\t\t\t) z1\n\t\t\t\t\t\t) z\x32\n\t\t\t\t\tWHERE z2.jqgrid_row BETWEEN ".($offset+1)." AND ".($offset+$nrows);
				}
				else
					$psql.=strpos(strtoupper($psql),'WHERE')?" and 1=2":" WHERE 1=2";
				break;
		}
		return$psql;
	}
	public static function execute($psql,$prm=null){$vrpofpwgyedn="ret";${$vrpofpwgyedn}=false;$iqxoqd="psql";${"GLOBALS"}["vveeihmhesue"]="ret";if(${$iqxoqd}){$jwwcnxfiscu="ret";${$jwwcnxfiscu}=$psql->execute();}return${${"GLOBALS"}["vveeihmhesue"]};}public static function query($conn,$sql){$znkzrojbed="sql";if(${${"GLOBALS"}["iadcxqaszl"]}&&strlen(${$znkzrojbed})>0){return$conn->query($sql);}return false;}public static function bindValues($stmt,$binds,$types){$cunghmbu="key";$lgbzinobh="field";${"GLOBALS"}["ubshkjprrt"]="binds";foreach(${${"GLOBALS"}["ubshkjprrt"]} as${$cunghmbu}=>${$lgbzinobh}){$roklrndkl="key";${"GLOBALS"}["vclsdsdmsie"]="field";${"GLOBALS"}["olwphav"]="field";if(${${"GLOBALS"}["effpknwir"]}===NULL){$lrtgxjbsqopn="key";$stmt->bindValue(${$lrtgxjbsqopn}+1,NULL,PDO::PARAM_NULL);continue;}${"GLOBALS"}["yfcstkp"]="key";switch(${${"GLOBALS"}["xmptkuizrczf"]}[${${"GLOBALS"}["zzhxvmewbbb"]}]){case"numeric":case"string":case"date":case"time":case"datetime":$stmt->bindValue(${${"GLOBALS"}["zzhxvmewbbb"]}+1,${${"GLOBALS"}["effpknwir"]},PDO::PARAM_STR);break;case"int":$stmt->bindValue(${${"GLOBALS"}["zzhxvmewbbb"]}+1,${${"GLOBALS"}["effpknwir"]},PDO::PARAM_INT);break;case"boolean":$stmt->bindValue(${${"GLOBALS"}["zzhxvmewbbb"]}+1,${${"GLOBALS"}["vclsdsdmsie"]},PDO::PARAM_BOOL);break;case"blob":$stmt->bindValue(${$roklrndkl}+1,${${"GLOBALS"}["olwphav"]},PDO::PARAM_LOB);break;case"custom":$stmt->bindValue(${${"GLOBALS"}["yfcstkp"]}+1,${${"GLOBALS"}["effpknwir"]});break;}}return true;}public static function beginTransaction($conn){return$conn->beginTransaction();}public static function commit($conn){return$conn->commit();}public static function rollBack($conn){return$conn->rollBack();}public static function lastInsertId($conn,$table,$IdCol,$dbtype){if(${${"GLOBALS"}["cgtadbksjf"]}=="pgsql"){$qczqjqbtxpn="table";$vlfnsgsru="IdCol";return$conn->lastInsertId(${$qczqjqbtxpn}."_".${$vlfnsgsru}."_seq");}else{return$conn->lastInsertId();}}
	public static function fetch_object($psql,$fetchall,$conn)
	{
		if($psql)
		{
			$old=$conn->getAttribute(PDO::ATTR_CASE);
			$conn->setAttribute(PDO::ATTR_CASE,PDO::CASE_NATURAL);
			if(!$fetchall)
			{
				$ret=$psql->fetch(PDO::FETCH_OBJ);
			}
			else
			{
				$ret=$psql->fetchAll(PDO::FETCH_OBJ);
			}
			$conn->setAttribute(PDO::ATTR_CASE,$old);
			return$ret;
		}
		return false;
	}
	public static function fetch_num($psql)
	{
		if($psql)
		{
			return$psql->fetch(PDO::FETCH_NUM);
		}
		return false;
	}
	public static function fetch_assoc($psql,$conn){if($psql){$jqjemtifyc="old";${$jqjemtifyc}=$conn->getAttribute(PDO::ATTR_CASE);$conn->setAttribute(PDO::ATTR_CASE,PDO::CASE_NATURAL);${"GLOBALS"}["jwqvhqb"]="ret";${${"GLOBALS"}["jwqvhqb"]}=$psql->fetch(PDO::FETCH_ASSOC);$conn->setAttribute(PDO::ATTR_CASE,${${"GLOBALS"}["xtedsueqf"]});return${${"GLOBALS"}["uiclphu"]};}return false;}
	public static function closeCursor($sql)
	{
		if($sql)
		{
			$sql->closeCursor();
		}
	}
	public static function columnCount($rs){${"GLOBALS"}["tkassxqrirw"]="rs";if(${${"GLOBALS"}["tkassxqrirw"]}){return$rs->columnCount();}else{return 0;}}
	public static function getColumnMeta($index,$sql)
	{
		if($sql&&${${"GLOBALS"}["vcwsuphnbfx"]}>=0)
		{
			$qyrnllc="index";
			return$sql->getColumnMeta(${$qyrnllc});
		}
	}
	public static function MetaType($t,$dbtype)
	{
		$meta="string";
		if(is_array($t))
		{
			$len=$t["len"];
			switch($dbtype)
			{
				case"pgsql":
					$type=$t["native_type"];
					$meta=self::MetaPgsql($type,$len);
					break;
				case"mysql":
					$type=isset($t["native_type"])?$t["native_type"]:"int";
					$meta=self::MetaMysql($type,$len);
					break;
				case"sqlite":
					$type=$t["sqlite:decl_type"];
					$meta=self::MetaSqlite($type,$len);
					break;
				case"sqlsrv":
					$type=$t["sqlsrv:decl_type"];
					$meta=self::MetaSqlsrv($type,$len);
					break;
			}
		}
		return$meta;
	}
	protected static function MetaPgsql($native_type,$max_len=-1){switch(strtoupper($native_type)){case"MONEY":case"INTERVAL":case"CHAR":case"CHARACTER":case"VARCHAR":case"NAME":case"B\x50CHAR":case"_VARCHAR":case"INET":case"MACADDR":return"string";case"TE\x58T":return"string";case"IMAGE":case"BLOB":case"BIT":case"VARBIT":case"BYTEA":return"blob";case"BOOL":case"BOOLEAN":return"boolean";case"DATE":return"date";case"TIMESTAM\x50 WITHOUT TIME \x5aONE":case"TIME":case"DATETIME":case"TIMESTAM\x50":case"TIMESTAMPTZ":return"datetime";case"SMALLINT":case"BIGINT":case"INTEGER":case"INT8":case"INT4":case"INT\x32":return"int";case"OID":case"SERIAL":return"int";default:return"numeric";}}protected static function MetaMysql($native_type,$max_length=-1){switch(strtoupper($native_type)){case"STRING":case"CHAR":case"VARCHAR":case"TINYBLOB":case"TINYTE\x58T":case"EN\x55M":case"VAR_STRING":case"SET":return"string";case"TEXT":case"LONGTEXT":case"MEDIUMTE\x58T":return"string";case"IMAGE":case"LONGBLOB":case"BLOB":case"MEDI\x55MBLOB":case"BINARY":return"blob";case"YEAR":case"DATE":return"date";case"TIME":case"DATETIME":case"TIMESTAM\x50":return"datetime";case"INT":case"INTEGER":case"BIGINT":case"TINYINT":case"MEDI\x55MINT":case"SMALLINT":case"LONG":return"int";default:return"numeric";}}protected static function MetaSqlite($native_type,$max_length=-1){${"GLOBALS"}["wvhjtuynhnl"]="native_type";switch(strtoupper(${${"GLOBALS"}["wvhjtuynhnl"]})){case"STRING":case"CHAR":case"CHARACTER":case"VARCHAR":case"NCHAR":case"NVARCHAR":case"TE\x58T":case"CLOB":case"VARYING CHARACTER":case"NATIVE CHARACTER":return"string";case"BLOB":return"blob";case"DATE":return"date";case"DATETIME":return"datetime";case"INT":case"INTEGER":case"BIGINT":case"TINYINT":case"MEDI\x55MINT":case"SMALLINT":case"UNSIGNED BIG INT":case"UNSIGNED":case"INT2":case"INT8":return"int";default:return"numeric";}}
	protected static function MetaSqlsrv($native_type,$max_length=-1)
	{
		switch(strtoupper($native_type))
		{
			case"BITINT":
			case"CHAR":
			case"DECIMAL":
			case"MONEY":
			case"NCHAR":
			case"NUMERIC":
			case"NVARCHAR":
			case"NTE\x58T":
			case"SMALLMONEY":
			case"S\x51L_VARIANT":
			case"TEXT":
			case"TIMESTAMP":
			case"\x55NI\x51\x55EIDENTIFIER":
			case"VARCHAR":
			case"\x58ML":
				return"string";
			case"BINARY":
			case"GEOGRAPHY":
			case"GEOMETRY":
			case"IMAGE":
			case"UDT":
			case"VARBINARY":
				return"blob";
			case"DATETIME":
			case"DATETIME\x32":
			case"DATETIMEOFFSET":
			case"SMALLDATETIME":
				return"datetime";
			case"TIME":
				return"time";
			case"DATE":
				return"date";
			case"INT":
			case"BIT":
			case"SMALLINT":
			case"TINYINT":
				return"int";
			default:
				return"numeric";
		}
	}
	public static function getPrimaryKey($table,$conn,$dbtype){${"GLOBALS"}["csbihnivtus"]="dbtype";$vnnpyexxcpp="conn";if(strlen(${${"GLOBALS"}["czkemhrt"]})>0&&${$vnnpyexxcpp}&&strlen(${${"GLOBALS"}["csbihnivtus"]})>0){$bepeonazckl="owner";${"GLOBALS"}["qvyuutgjqxf"]="rs";$rjulgf="pos";$ahnwlmsvfk="result";${"GLOBALS"}["iirfipndhrqj"]="stmt";${"GLOBALS"}["ayxbnnwnd"]="sql";${"GLOBALS"}["gsicvfqptuf"]="conn";$crnngmdlhxkx="table";${"GLOBALS"}["zpogtb"]="stmt";$ttwxypmrj="sql";${"GLOBALS"}["qpspplcnir"]="rs";${"GLOBALS"}["kpntpgfuqm"]="sql";${"GLOBALS"}["nzewomohxk"]="sql";${"GLOBALS"}["nvimdpeebyt"]="sql";${"GLOBALS"}["iuxshccum"]="rs";${"GLOBALS"}["eyzrkr"]="result";$ptdyxyfjgi="column_name";$jwhuse="precision";$mksuwcdqpnga="dbtype";${"GLOBALS"}["dfsgdolovqol"]="length";$apwjcoauq="sql";$mkmelgmwh="column_def";${"GLOBALS"}["evqtsnqec"]="pkey_column_name";${"GLOBALS"}["qcgtrqe"]="res";$ypiqixopu="owner";$vuwgcqvhroh="sql";$sulkecq="scale";$tyicuskxfvg="column_position";${"GLOBALS"}["xegbdlb"]="sql";$oocuuosiry="res";switch(${$mksuwcdqpnga}){case"pgsql":${${"GLOBALS"}["nvimdpeebyt"]}="select column_name from information_schema.constraint_column_usage where table_name \x3d \x27".${$crnngmdlhxkx}."'";${${"GLOBALS"}["qpspplcnir"]}=$conn->query(${${"GLOBALS"}["xegbdlb"]},PDO::FETCH_NUM);if(${${"GLOBALS"}["iuxshccum"]}){$twuxybtw="res";${$twuxybtw}=$rs->fetch();self::closeCursor(${${"GLOBALS"}["uuexsogf"]});if(${${"GLOBALS"}["sdrpggwsple"]}){${"GLOBALS"}["qaeedhqmpr"]="res";return${${"GLOBALS"}["qaeedhqmpr"]}[0];}}return false;break;case"mysql":${$ttwxypmrj}="select column_name from information_schema.statistics where table_name\x3d\x27".${${"GLOBALS"}["czkemhrt"]}."'";${${"GLOBALS"}["qvyuutgjqxf"]}=$conn->query($sql,PDO::FETCH_NUM);if(${${"GLOBALS"}["uuexsogf"]}){$fxqdpgngkh="res";${$fxqdpgngkh}=$rs->fetch();$nqmuwffi="rs";self::closeCursor(${$nqmuwffi});if(${${"GLOBALS"}["sdrpggwsple"]}){return${${"GLOBALS"}["sdrpggwsple"]}[0];}}return false;break;case"sqlite":${$rjulgf}=strpos(${${"GLOBALS"}["czkemhrt"]},"\x2e");if(${${"GLOBALS"}["rwthfv"]}===false){$sql="PRAGMA table_info($table)";}else{${"GLOBALS"}["cdeuds"]="table";${"GLOBALS"}["agstoii"]="pos";$qjmbiggr="pos";${${"GLOBALS"}["sbhcybb"]}=substr(${${"GLOBALS"}["czkemhrt"]},0,${$qjmbiggr});${${"GLOBALS"}["czkemhrt"]}=substr(${${"GLOBALS"}["cdeuds"]},${${"GLOBALS"}["agstoii"]}+1);$sql="\x50RAGMA $schemaName.table_info($table)";}${${"GLOBALS"}["qcgtrqe"]}=false;${${"GLOBALS"}["ssgpxly"]}=$conn->query(${${"GLOBALS"}["nzewomohxk"]},PDO::FETCH_ASSOC);if(${${"GLOBALS"}["ssgpxly"]}){${"GLOBALS"}["cajgite"]="row";${"GLOBALS"}["tgdoqr"]="stmt";while(${${"GLOBALS"}["cajgite"]}=$stmt->fetch()){${"GLOBALS"}["cbtlquxnifj"]="row";if(${${"GLOBALS"}["cbtlquxnifj"]}["pk"]==1){${"GLOBALS"}["mkekdn"]="res";${${"GLOBALS"}["mkekdn"]}=${${"GLOBALS"}["dvifpbhwqt"]}["name"];break;}}self::closeCursor(${${"GLOBALS"}["tgdoqr"]});}return${$oocuuosiry};break;case"sqlsrv":${$vuwgcqvhroh}="exec sp_columns \x40table_name \x3d '".${${"GLOBALS"}["czkemhrt"]}."\x27";${${"GLOBALS"}["ssgpxly"]}=self::query(${${"GLOBALS"}["gsicvfqptuf"]},${${"GLOBALS"}["kpntpgfuqm"]});if(!${${"GLOBALS"}["ssgpxly"]}){return false;}${${"GLOBALS"}["kcfomhcttn"]}=array();while(${${"GLOBALS"}["dvifpbhwqt"]}=self::fetch_num(${${"GLOBALS"}["iirfipndhrqj"]})){${"GLOBALS"}["grxkjon"]="result";${${"GLOBALS"}["grxkjon"]}[]=${${"GLOBALS"}["dvifpbhwqt"]};}${$bepeonazckl}=1;${${"GLOBALS"}["cnlqwmcgul"]}=2;${$ptdyxyfjgi}=3;${${"GLOBALS"}["acoujrpky"]}=5;${$jwhuse}=6;${${"GLOBALS"}["dfsgdolovqol"]}=7;${$sulkecq}=8;${${"GLOBALS"}["jmonviyu"]}=10;${$mkmelgmwh}=12;${$tyicuskxfvg}=16;if(count(${$ahnwlmsvfk})==0){return false;}self::closeCursor(${${"GLOBALS"}["ssgpxly"]});${${"GLOBALS"}["wmzediu"]}=${${"GLOBALS"}["eyzrkr"]}[0][${$ypiqixopu}];${${"GLOBALS"}["ayxbnnwnd"]}="exec sp_pkeys \x40table_owner \x3d ".${${"GLOBALS"}["wmzediu"]}.", @table_name \x3d '".${${"GLOBALS"}["czkemhrt"]}."\x27";${${"GLOBALS"}["zpogtb"]}=self::query(${${"GLOBALS"}["iadcxqaszl"]},${$apwjcoauq});if(${${"GLOBALS"}["ssgpxly"]}){${"GLOBALS"}["eqwksrbnor"]="stmt";${${"GLOBALS"}["wcczlytlfqwg"]}=self::fetch_num(${${"GLOBALS"}["eqwksrbnor"]});self::closeCursor(${${"GLOBALS"}["ssgpxly"]});}${${"GLOBALS"}["evqtsnqec"]}=3;${${"GLOBALS"}["neuucnrebf"]}=4;if(${${"GLOBALS"}["wcczlytlfqwg"]}&&${${"GLOBALS"}["wcczlytlfqwg"]}[${${"GLOBALS"}["olgyyghcj"]}]){return${${"GLOBALS"}["wcczlytlfqwg"]}[${${"GLOBALS"}["olgyyghcj"]}];}return false;break;}}return false;}public static function errorMessage($conn){${"GLOBALS"}["ttmlbbznytm"]="ret";${${"GLOBALS"}["uiclphu"]}=$conn->errorInfo();$tgrntug="ret";return"Code: ".${${"GLOBALS"}["ttmlbbznytm"]}[1]."\x2e ".${$tgrntug}[2];}
}
?>