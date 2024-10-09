<?php
namespace rivcar\jqGrid;
use rivcar\jqgrid\jqGridUtils;
use rivcar\jqgrid\jqGridDB;
use PDO;
use stdClass;

${"GLOBALS"}["qjeurszu"]="adata";
${"GLOBALS"}["lmduekgr"]="jsonp";
${"GLOBALS"}["uhshmndtq"]="callback";
${"GLOBALS"}["wxlngg"]="response";
${"GLOBALS"}["oyqmlxy"]="gridcnt";
${"GLOBALS"}["kqnjil"]="newformat";${"GLOBALS"}["gfiapwq"]="i";${"GLOBALS"}["luysyssdo"]="csa";${"GLOBALS"}["tmmymefrg"]="s\x32a";${"GLOBALS"}["ibrervv"]="otype";${"GLOBALS"}["bxykmk"]="filter";${"GLOBALS"}["smpirnpxgh"]="gopr";${"GLOBALS"}["nlbsofc"]="rules";${"GLOBALS"}["dnwoullfxllm"]="jsona";
${"GLOBALS"}["scjljpe"]="str_filter";${"GLOBALS"}["fcywbkumd"]="in_array";${"GLOBALS"}["zgeyyonth"]="field";${"GLOBALS"}["gzyxgquy"]="val";${"GLOBALS"}["bcjlzwhmaqy"]="op";${"GLOBALS"}["sqhqhnwyp"]="key";${"GLOBALS"}["qtphlmyygf"]="s_p";${"GLOBALS"}["uselnox"]="s_s";${"GLOBALS"}["covnpos"]="prm";${"GLOBALS"}["qbuwkwuz"]="dat";${"GLOBALS"}["owqtmbo"]="j";${"GLOBALS"}["rinmdlw"]="group";${"GLOBALS"}["tfchzbbiy"]="sopt";${"GLOBALS"}["dwfpyydmwqy"]="fetchAll";${"GLOBALS"}["ukfvbqt"]="rewritesql";${"GLOBALS"}["ygmrjmrkgph"]="s";${"GLOBALS"}["mkvvnlsckeh"]="k";${"GLOBALS"}["weubexc"]="sumcols";
${"GLOBALS"}["xvcvwmzcjrm"]="root";${"GLOBALS"}["mlyrnuvpfiqo"]="sqlFile";${"GLOBALS"}["xurwtyw"]="tmp";
${"GLOBALS"}["dncmjohqwo"]="v";${"GLOBALS"}["rseyknxmplx"]="sort";${"GLOBALS"}["cwiyaz"]="order";
${"GLOBALS"}["yduhqorujui"]="nrows";
${"GLOBALS"}["nldqtrme"]="str";
${"GLOBALS"}["rekomdjbmu"]="aopt";${"GLOBALS"}["srohmftnhftl"]="queryLog";${"GLOBALS"}["rjnwtqq"]="the_string";
${"GLOBALS"}["uswrxlp"]="file";${"GLOBALS"}["jeftdexgyxi"]="primary";${"GLOBALS"}["jttyapriutm"]="fld";
${"GLOBALS"}["hkuervuli"]="types";
${"GLOBALS"}["kokhmowyw"]="data";
//if(!defined("PHPS\x55ITO_ROOT")){define("\x50HPSUITO_ROOT",dirname(__FILE__)."/");require(PHPSUITO_ROOT."Autoloader.php");}

class jqGrid{
	public$version='5.3.1';
	protected$pdo;
	protected$odbc;
	protected$I='';
	protected$dbtype;
	protected$select="";
	protected$params=null;
	protected$dbdateformat='Y-m-d';
	protected$dbtimeformat='Y-m-d H:i:s';
	protected$userdateformat='d/m/Y';
	protected$usertimeformat='d/m/Y H:i:s';
	protected static$queryLog=array();
	protected$tmpvar=false;
	public function logQuery($sql,$data=null,$types=null,$input=null,$fld=null,$primary='')
	{
		${"GLOBALS"}["cxiziciwbq"]="sql";
		${"GLOBALS"}["ixdhhegeht"]="input";
		self::$queryLog[]=array("time"=>date("Y-m-d H:i:s"),"query"=>${${"GLOBALS"}["cxiziciwbq"]},"data"=>${${"GLOBALS"}["kokhmowyw"]},"types"=>${${"GLOBALS"}["hkuervuli"]},"fields"=>${${"GLOBALS"}["jttyapriutm"]},"primary"=>${${"GLOBALS"}["jeftdexgyxi"]},"input"=>${${"GLOBALS"}["ixdhhegeht"]});
	}
	public$debug=false;
	public$logtofile=true;protected$logfile="jqGrid.log";public function setLogFile($file){if(${${"GLOBALS"}["uswrxlp"]}&&is_string(${${"GLOBALS"}["uswrxlp"]})){${"GLOBALS"}["wwtsewnysv"]="file";$this->logfile=${${"GLOBALS"}["wwtsewnysv"]};}}
	public function debugout()
	{
		if($this->logtofile)
		{
			$fh=@fopen($this->logfile,"a+");
			if($fh)
			{
				${"GLOBALS"}["abdlwnwyqwc"]="queryLog";
				$cdcuawxb="fh";
				${${"GLOBALS"}["rjnwtqq"]}="Executed ".count(self::${${"GLOBALS"}["abdlwnwyqwc"]})." query(s) - ".date("Y-m-d H:i:s")."\n";
				$gydisuu="the_string";
				${$gydisuu}.=print_r(self::${${"GLOBALS"}["srohmftnhftl"]},true);
				${"GLOBALS"}["jwsfyg"]="the_string";
				$yhtlrwwy="fh";
				fputs(${$cdcuawxb},${${"GLOBALS"}["rjnwtqq"]},strlen(${${"GLOBALS"}["jwsfyg"]}));
				fclose(${$yhtlrwwy});
				return(true);
			}
			else
			{
				echo"Can not write to log!";
			}
		}
		else
		{
			echo"<pre>\n";
			print_r(self::$queryLog);
			echo"</pre>\n";
		}
	}
	public$showError=false;public$errorMessage='';public function sendErrorHeader(){if($this->errorMessage){header($_SERVER["SER\x56ER_PROTOCOL"]." 500 Internal Server error.");if($this->customClass){try{$this->errorMessage=call_user_func(array($this->customClass,$this->customError),$this->oper,$this->errorMessage);}catch(Exception$e){echo"Can not call the method class - ".$e->getMessage();}}else if(function_exists($this->customError)){$this->errorMessage=call_user_func($this->customError,$this->oper,$this->errorMessage);}die($this->errorMessage);}}
	protected$GridParams=array("page"=>"page","rows"=>"rows","sort"=>"sidx","order"=>"sord","search"=>"_search","nd"=>"nd","id"=>"id","filter"=>"filters","searchField"=>"searchField","searchOper"=>"searchOper","searchString"=>"searchString","oper"=>"oper","query"=>"grid","addoper"=>"add","editoper"=>"edit","deloper"=>"del","excel"=>"excel","subgrid"=>"subgrid","totalrows"=>"totalrows","autocomplete"=>"autocmpl");
	public$dataType="xml";
	public$encoding="utf-8";
	public$jsonencode=true;
	public$datearray=array();
	public$mongointegers=array();public$mongofields=array();public$SelectCommand="";public$ExportCommand="";public$gSQLMaxRows=1000;public$SubgridCommand="";public$table="";protected$primaryKey;public$readFromXML=false;protected$userdata=null;public$customFunc=null;public$customClass=false;public$customError=null;public$xmlCDATA=false;public$optimizeSearch=false;public$ignoreCaseSearch=false;protected$caseSearchOpt=array("sqlfunc"=>"UPPER","phpfunc"=>"strtoupper");public function setSearchOptions($aopt){if(is_array(${${"GLOBALS"}["rekomdjbmu"]})){$this->caseSearchOpt=array_merge($this->caseSearchOpt,${${"GLOBALS"}["rekomdjbmu"]});}
		}
	public$cacheCount=false;
	public$performcount=true;
	public$oper;
	public$summaryalias=true;
	public$parseSort=true;
	function __construct($db=null,$odbctype='')
	{
		$ugrubfw="ms";
		$foqyhxutfsal="str";
		if(class_exists("rivcar\jqgrid\jqGridDB"))
		{
			$interface=jqGridDB::getInterface();
		}
		else
		{
			$interface="local";
		}
		date_default_timezone_set("America/Lima");
		$this->pdo=$db;
		if($interface=="pdo"&&is_object($this->pdo))
		{
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$this->dbtype=$this->pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
			if($this->dbtype=="pgsql")
			{
				$this->I="I";
			}
		}
		else
		{
			$this->dbtype=$interface.$odbctype;
			$this->odbc=$odbctype;
		}
		if($interface=="array")
		{
			$this->summaryalias=false;
		}
		$oper=$this->GridParams["oper"];
		$this->oper=jqGridUtils::GetParam($oper,false);
	}
	protected function parseSql($sqlElement,$params,$bind=true)
	{
		$sql=jqGridDB::prepare($this->pdo,$sqlElement,$params,$bind);
		return$sql;
	}
	protected function execute($sqlId,$params,&$sql,$limit=false,$nrows=-1,$offset=-1,$order='',$sort='')
	{
		if($this->dbtype=="mongodb")
		{
			$muwvdouqclv="limit";
			return jqGridDB::mongoexecute($sqlId,$params,$sql,${$muwvdouqclv},${${"GLOBALS"}["yduhqorujui"]}=0,$offset,${${"GLOBALS"}["cwiyaz"]},${${"GLOBALS"}["rseyknxmplx"]},$this->mongofields);
		}
		if($this->dbtype=="array")
		{
			${"GLOBALS"}["bkjizcydft"]="params";
			if($params&&is_array(${${"GLOBALS"}["bkjizcydft"]}))
			{
				${"GLOBALS"}["bkjlfhmypo"]="params";
				${"GLOBALS"}["yiknstdjww"]="k";
				foreach(${${"GLOBALS"}["bkjlfhmypo"]} as${${"GLOBALS"}["yiknstdjww"]}=>${${"GLOBALS"}["dncmjohqwo"]})
				{
					${"GLOBALS"}["gpqwsrba"]="k";
					$hhndpjeei="v";
					$params[${${"GLOBALS"}["gpqwsrba"]}]="'".${$hhndpjeei}."'";
				}
			}
		}
		$this->select=$sqlId;
		if($limit)
		{
			if($this->dbtype=="adodb")
			{
				$sql=jqGridDB::limit($this->pdo,$this->select,$nrows,$offset,$params);
				if($this->debug)
				{
					$this->logQuery($sql->sql,$params);
				}
				return$sql?true:false;
			}
			else
			{
				$this->select=jqGridDB::limit($this->select,$this->dbtype,$nrows,$offset,$order,$sort);
			}
		}
		if($this->debug)
		{
			$this->logQuery($this->select,$params);
		}
		$this->params=$params;
		try
		{
			$sql=$this->parseSql($this->select,$params);
			$ret=true;
			if($sql)
			{
				if($this->dbtype=="adodb"||$this->dbtype=="ibase")
				{
					$sql=jqGridDB::execute($sql,$params,$this->pdo);
					$ret=$sql?true:false;
				}
				else
				{
					$ret=jqGridDB::execute($sql,$params,$this->pdo);
				}
			}
			if(!$ret)
			{
				$this->errorMessage=jqGridDB::errorMessage($this->pdo);
				throw new Exception($this->errorMessage);
			}
		}
		catch(Exception$e)
		{
			if(!$this->errorMessage)
			{
				$this->errorMessage=$e->getMessage();
			}
			if($this->showError)
			{
				$this->sendErrorHeader();
			}
			else
			{
				echo$this->errorMessage;
			}
			return false;
		}
		return true;
	}
	protected function getSqlElement($sqlId){${"GLOBALS"}["yosnbiy"]="tmp";$gdidyylouct="sqlFile";${${"GLOBALS"}["yosnbiy"]}=explode(".",$sqlId);${$gdidyylouct}=trim(${${"GLOBALS"}["xurwtyw"]}[0]).".xml";if(file_exists(${${"GLOBALS"}["mlyrnuvpfiqo"]})){${"GLOBALS"}["dpbsvjixyomt"]="sqlFile";${${"GLOBALS"}["xvcvwmzcjrm"]}=simplexml_load_file(${${"GLOBALS"}["dpbsvjixyomt"]});$mxraohvypg="sql";foreach($root->sql as${$mxraohvypg}){${"GLOBALS"}["vqdrnstx"]="tmp";if($sql["Id"]==${${"GLOBALS"}["vqdrnstx"]}[1]){${"GLOBALS"}["bxwjchqchh"]="sql";if(isset(${${"GLOBALS"}["bxwjchqchh"]}["table"])&&strlen($sql["table"])>0){${"GLOBALS"}["bioplbg"]="sql";$this->table=${${"GLOBALS"}["bioplbg"]}["table"];}if(isset($sql["primary"])&&strlen($sql["primary"])>0){${"GLOBALS"}["qsvzfbnploq"]="sql";$this->primaryKey=${${"GLOBALS"}["qsvzfbnploq"]}["primary"];}return$sql;}}}return false;}
	protected function _getcount($sql,array$params=null,array$sumcols=null)
	{
		$qryRecs=new stdClass();
		$taicmqlqvld="s";$jygiowycm="sumcols";
		${"GLOBALS"}["ytexlpxwbgg"]="sql";
		$sldttypo="sql";
		${"GLOBALS"}["akybeecb"]="sql";
		$ktoxqbput="count1";
		$rodwyrgjpmi="sql";
		$qryRecs->COUNTR=0;
		$ugzmqxibdu="sql";
		${"GLOBALS"}["odheyzdfw"]="sql";
		${$taicmqlqvld}="";
		if(is_array(${$jygiowycm})&&!empty(${${"GLOBALS"}["weubexc"]}))
		{
			${"GLOBALS"}["lrgmsgwgygpv"]="k";
			foreach(${${"GLOBALS"}["weubexc"]} as${${"GLOBALS"}["lrgmsgwgygpv"]}=>${${"GLOBALS"}["dncmjohqwo"]})
			{
				if(is_array(${${"GLOBALS"}["dncmjohqwo"]}))
				{
					$gukrhmlwh="dbfield";
					foreach(${${"GLOBALS"}["dncmjohqwo"]} as${$gukrhmlwh}=>$oper)
					{
						${"GLOBALS"}["zelebdk"]="oper";
						$paukhsuasye="dbfield";
						$esissd="s";
						${$esissd}.=",".trim(${${"GLOBALS"}["zelebdk"]})."(".${$paukhsuasye}.") AS ".${${"GLOBALS"}["mkvvnlsckeh"]};
					}
				}
				else
				{
					${"GLOBALS"}["pilpehcy"]="k";
					${"GLOBALS"}["ykxvirxinxpn"]="s";
					${"GLOBALS"}["psbwuj"]="v";
					${${"GLOBALS"}["ykxvirxinxpn"]}.=",S\x55M(".${${"GLOBALS"}["psbwuj"]}.") AS ".${${"GLOBALS"}["pilpehcy"]};
				}
			}
		}
		$sql=str_replace("\r"," ",$sql,${$ktoxqbput});
		if($this->summaryalias===true||preg_match("/^\\s*SELECT\x5cs+DISTINCT/is",${${"GLOBALS"}["akybeecb"]})||preg_match("/\x5cs+GROUP\x5cs+BY\\s+/is",${$ugzmqxibdu})||preg_match("/\\s+UNION\\s+/is",${${"GLOBALS"}["ytexlpxwbgg"]})||substr_count(strtoupper(${$sldttypo}),"SELECT ")>1||substr_count(strtoupper(${$rodwyrgjpmi})," FROM ")>1||$this->dbtype=="oci8")
		{
			${"GLOBALS"}["lebvmixs"]="s";
			$lnmilsf="rewritesql";
			${$lnmilsf}="SELECT CO\x55NT(*) AS CO\x55NTR ".${${"GLOBALS"}["lebvmixs"]}." FROM ($sql) gridalias";
		}
		else
		{
			${"GLOBALS"}["nhhhwesn"]="sql";
			$tcdkinfved="rewritesql";
			${$tcdkinfved}=preg_replace("/^\x5cs*SELECT\\s.*\\s+FROM\\s/Uis","SELECT COUNT(*) AS COUNTR ".${${"GLOBALS"}["ygmrjmrkgph"]}." FROM ",${${"GLOBALS"}["nhhhwesn"]});
		}
		if(isset(${${"GLOBALS"}["ukfvbqt"]})&&${${"GLOBALS"}["ukfvbqt"]}!=${${"GLOBALS"}["odheyzdfw"]})
		{
			$iidjimb="qryRecs";
			${"GLOBALS"}["btwohhti"]="rewritesql";
			$vpgvado="params";
			${$iidjimb}=$this->queryForObject(${${"GLOBALS"}["btwohhti"]},${$vpgvado},false);
			if($qryRecs)
			{
				return$qryRecs;
			}
		}
		return$qryRecs;
	}
	protected function queryForObject($sqlId,$params,$fetchAll=false)
	{
		${"GLOBALS"}["vorhxfibdm"]="params";
		${"GLOBALS"}["xjhgzao"]="sqlId";
		${"GLOBALS"}["thadziyeslk"]="ret";
		${"GLOBALS"}["otstdpy"]="sql";
		${${"GLOBALS"}["otstdpy"]}=null;
		$ret=$this->execute(${${"GLOBALS"}["xjhgzao"]},${${"GLOBALS"}["vorhxfibdm"]},$sql,false);
		${"GLOBALS"}["ejwpvvoupy"]="ret";
		if(${${"GLOBALS"}["ejwpvvoupy"]})
		{
			$okfvsnnihe="ret";
			${$okfvsnnihe}=jqGridDB::fetch_object($sql,${${"GLOBALS"}["dwfpyydmwqy"]},$this->pdo);
			jqGridDB::closeCursor($sql);
		}
		return${${"GLOBALS"}["thadziyeslk"]};
	}
	protected function getStringForGroup($group,$prm){${"GLOBALS"}["fuireiqgs"]="i_";${${"GLOBALS"}["fuireiqgs"]}=$this->I;${${"GLOBALS"}["tfchzbbiy"]}=array("eq"=>"=","ne"=>"<>","lt"=>"<","le"=>"<=","gt"=>">","ge"=>">=","bw"=>" {$i_}LI\x4bE ","bn"=>" NOT {$i_}LI\x4bE ","in"=>" IN ","ni"=>" NOT IN","ew"=>" {$i_}LI\x4bE ","en"=>" NOT {$i_}LI\x4bE ","cn"=>" {$i_}LIKE ","nc"=>" NOT {$i_}LIKE ","nu"=>"IS N\x55LL","nn"=>"IS NOT N\x55LL");$llykcvffu="group";$dluigbrgdw="s";${${"GLOBALS"}["ygmrjmrkgph"]}="(";if(isset(${$llykcvffu}["groups"])&&is_array(${${"GLOBALS"}["rinmdlw"]}["groups"])&&count(${${"GLOBALS"}["rinmdlw"]}["groups"])>0){${"GLOBALS"}["nwhths"]="j";$mbojbpvcibf="j";for(${${"GLOBALS"}["owqtmbo"]}=0;${${"GLOBALS"}["nwhths"]}<count(${${"GLOBALS"}["rinmdlw"]}["groups"]);${$mbojbpvcibf}++){${"GLOBALS"}["xgxluvc"]="s";if(strlen(${${"GLOBALS"}["xgxluvc"]})>1){${"GLOBALS"}["akhhtenf"]="s";$xsrknu="group";${${"GLOBALS"}["akhhtenf"]}.=" ".${$xsrknu}["groupOp"]." ";}try{$twnvvidvsn="j";${"GLOBALS"}["mviyqsrktjnm"]="prm";$pfxcgfw="group";$jfptesnux="dat";${${"GLOBALS"}["qbuwkwuz"]}=$this->getStringForGroup(${$pfxcgfw}["groups"][${$twnvvidvsn}],${${"GLOBALS"}["covnpos"]});${${"GLOBALS"}["ygmrjmrkgph"]}.=${${"GLOBALS"}["qbuwkwuz"]}[0];${${"GLOBALS"}["mviyqsrktjnm"]}=${${"GLOBALS"}["covnpos"]}+${$jfptesnux}[1];}catch(Exception$e){echo$e->getMessage();}}}if(isset(${${"GLOBALS"}["rinmdlw"]}["rules"])&&count(${${"GLOBALS"}["rinmdlw"]}["rules"])>0){try{${"GLOBALS"}["fpghtz"]="val";${${"GLOBALS"}["uselnox"]}=${${"GLOBALS"}["qtphlmyygf"]}=false;if($this->ignoreCaseSearch){${${"GLOBALS"}["uselnox"]}=isset($this->caseSearchOpt["sqlfunc"])?$this->caseSearchOpt["sqlfunc"]:false;${"GLOBALS"}["pcnpeimr"]="s_p";${${"GLOBALS"}["pcnpeimr"]}=isset($this->caseSearchOpt["phpfunc"])?$this->caseSearchOpt["phpfunc"]:false;}foreach(${${"GLOBALS"}["rinmdlw"]}["rules"]as${${"GLOBALS"}["sqhqhnwyp"]}=>${${"GLOBALS"}["fpghtz"]}){${"GLOBALS"}["fkcjwqq"]="op";if(strlen(${${"GLOBALS"}["ygmrjmrkgph"]})>1){$txhuccd="group";$qwjoxhf="s";${$qwjoxhf}.=" ".${$txhuccd}["groupOp"]." ";}${"GLOBALS"}["jjfbviseqg"]="val";${"GLOBALS"}["fvozubs"]="field";${"GLOBALS"}["xnmuddxe"]="v";$qnfuqeuxd="val";${${"GLOBALS"}["fvozubs"]}=${${"GLOBALS"}["jjfbviseqg"]}["field"];${${"GLOBALS"}["bcjlzwhmaqy"]}=${$qnfuqeuxd}["op"];${${"GLOBALS"}["xnmuddxe"]}=${${"GLOBALS"}["gzyxgquy"]}["data"];if(strtolower($this->encoding)!="utf-\x38"){$ayeygwhqya="v";${${"GLOBALS"}["dncmjohqwo"]}=iconv("utf-\x38",$this->encoding."//TRANSLIT",${$ayeygwhqya});}if(${${"GLOBALS"}["uselnox"]}&&${${"GLOBALS"}["qtphlmyygf"]}){${"GLOBALS"}["yrwiwajy"]="field";$qqhqjrjozu="s_s";$opvrcclan="v";${"GLOBALS"}["wivgkfj"]="v";${"GLOBALS"}["toenwhbscv"]="s_p";${${"GLOBALS"}["zgeyyonth"]}=${$qqhqjrjozu}."( ".${${"GLOBALS"}["yrwiwajy"]}." )";${${"GLOBALS"}["wivgkfj"]}=call_user_func(${${"GLOBALS"}["toenwhbscv"]},${$opvrcclan});}if(${${"GLOBALS"}["fkcjwqq"]}){${"GLOBALS"}["ccxpuxbw"]="field";${"GLOBALS"}["jbmlueud"]="field";${"GLOBALS"}["mewpqyg"]="in_array";${"GLOBALS"}["deufxzltg"]="op";$xuwbiwbwkhgu="field";$qsglungyb="op";$aqvmxgbkiw="op";${"GLOBALS"}["qswymwweild"]="s";$wdfgqmdfbo="field";$koqntmqewwfb="field";$thbovltmi="field";${"GLOBALS"}["ookuvxvbbyu"]="op";${"GLOBALS"}["tivrggueb"]="v";${"GLOBALS"}["fzneoorwmo"]="tmp";${"GLOBALS"}["kqdzehrspa"]="prm";$hpdtlicysqc="s";${"GLOBALS"}["tzkorexb"]="op";
			if(in_array(${$koqntmqewwfb},$this->datearray))
			{
				${${"GLOBALS"}["dncmjohqwo"]}=jqGridUtils::parseDate($this->userdateformat,${${"GLOBALS"}["dncmjohqwo"]},$this->dbdateformat);
			}
			$nomjphelo="prm";
			switch(${${"GLOBALS"}["bcjlzwhmaqy"]}){case"bw":case"bn":${${"GLOBALS"}["ygmrjmrkgph"]}.=${$xuwbiwbwkhgu}." ".${${"GLOBALS"}["tfchzbbiy"]}[${${"GLOBALS"}["tzkorexb"]}]." ?";${${"GLOBALS"}["covnpos"]}[]="$v%";break;case"ew":case"en":${${"GLOBALS"}["ygmrjmrkgph"]}.=${${"GLOBALS"}["ccxpuxbw"]}." ".${${"GLOBALS"}["tfchzbbiy"]}[${$qsglungyb}]." ?";${${"GLOBALS"}["covnpos"]}[]="%$v";break;case"cn":case"nc":${${"GLOBALS"}["ygmrjmrkgph"]}.=${${"GLOBALS"}["jbmlueud"]}." ".${${"GLOBALS"}["tfchzbbiy"]}[${${"GLOBALS"}["deufxzltg"]}]." ?";${${"GLOBALS"}["covnpos"]}[]="%$v\x25";break;case"in":case"ni":${${"GLOBALS"}["fcywbkumd"]}=explode(",",${${"GLOBALS"}["tivrggueb"]});${${"GLOBALS"}["fzneoorwmo"]}=str_repeat("?,",count(${${"GLOBALS"}["mewpqyg"]})-1)."?";${${"GLOBALS"}["ygmrjmrkgph"]}.=${$thbovltmi}." ".${${"GLOBALS"}["tfchzbbiy"]}[${$aqvmxgbkiw}]."( $tmp )";${$nomjphelo}=array_merge(${${"GLOBALS"}["covnpos"]},${${"GLOBALS"}["fcywbkumd"]});break;case"nu":case"nn":${$hpdtlicysqc}.=${$wdfgqmdfbo}." ".${${"GLOBALS"}["tfchzbbiy"]}[${${"GLOBALS"}["bcjlzwhmaqy"]}]." ";break;default:${${"GLOBALS"}["qswymwweild"]}.=${${"GLOBALS"}["zgeyyonth"]}." ".${${"GLOBALS"}["tfchzbbiy"]}[${${"GLOBALS"}["ookuvxvbbyu"]}]." ?";${${"GLOBALS"}["kqdzehrspa"]}[]=${${"GLOBALS"}["dncmjohqwo"]};break;}}}}catch(Exception$e){echo$e->getMessage();}}${${"GLOBALS"}["ygmrjmrkgph"]}.=")";if(${$dluigbrgdw}=="()"){$yreeeugkr="prm";return array("",${$yreeeugkr});}else{${"GLOBALS"}["wdzjit"]="prm";return array(${${"GLOBALS"}["ygmrjmrkgph"]},${${"GLOBALS"}["wdzjit"]});}}protected function _buildSearch(array$prm=null,$str_filter=''){${"GLOBALS"}["ousbmimcic"]="filters";${"GLOBALS"}["vsrbkax"]="filters";${"GLOBALS"}["qgefpswjryk"]="jsona";$ovbuwipxicw="rules";
			${${"GLOBALS"}["ousbmimcic"]}=(${${"GLOBALS"}["scjljpe"]}&&strlen(${${"GLOBALS"}["scjljpe"]})>0)?${${"GLOBALS"}["scjljpe"]}:jqGridUtils::GetParam($this->GridParams["filter"],"");
			${$ovbuwipxicw}=array();$xkqnwrkl="ret";if(${${"GLOBALS"}["vsrbkax"]}){$count=0;if(function_exists("json_decode")&&strtolower(trim($this->encoding))=="utf-8"&&$count==0){${"GLOBALS"}["qebwiqoes"]="jsona";$hcofuhosbkzg="filters";${${"GLOBALS"}["qebwiqoes"]}=json_decode(${$hcofuhosbkzg},true);}else{${"GLOBALS"}["qkefps"]="filters";${"GLOBALS"}["hgqxxdxpbxg"]="jsona";${${"GLOBALS"}["hgqxxdxpbxg"]}=jqGridUtils::decode(${${"GLOBALS"}["qkefps"]});}$cjfhbvl="jsona";if(isset(${${"GLOBALS"}["dnwoullfxllm"]})&&is_array(${$cjfhbvl})){$rvyuftcpx="gopr";${$rvyuftcpx}=${${"GLOBALS"}["dnwoullfxllm"]}["groupOp"];${${"GLOBALS"}["nlbsofc"]}[0]["data"]="dummy";}}else if(jqGridUtils::GetParam($this->GridParams["searchField"],"")){${${"GLOBALS"}["smpirnpxgh"]}="";${${"GLOBALS"}["nlbsofc"]}[0]["field"]=jqGridUtils::GetParam($this->GridParams["searchField"],"");${${"GLOBALS"}["nlbsofc"]}[0]["op"]=jqGridUtils::GetParam($this->GridParams["searchOper"],"");${${"GLOBALS"}["nlbsofc"]}[0]["data"]=jqGridUtils::GetParam($this->GridParams["searchString"],"");${${"GLOBALS"}["dnwoullfxllm"]}=array();${${"GLOBALS"}["dnwoullfxllm"]}["groupOp"]="AND";$kkxtoqwwh="rules";${${"GLOBALS"}["dnwoullfxllm"]}["rules"]=${$kkxtoqwwh};${${"GLOBALS"}["dnwoullfxllm"]}["groups"]=array();}$ret=array("",${${"GLOBALS"}["covnpos"]});if(isset(${${"GLOBALS"}["qgefpswjryk"]})&&${${"GLOBALS"}["dnwoullfxllm"]}){if(${${"GLOBALS"}["nlbsofc"]}&&count(${${"GLOBALS"}["nlbsofc"]})>0){$mgtznbylke="prm";$wqnwiwatrvd="jsona";${"GLOBALS"}["wnoruoh"]="prm";if(!is_array(${$mgtznbylke})){${${"GLOBALS"}["covnpos"]}=array();}${"GLOBALS"}["xmknmahpbe"]="ret";${${"GLOBALS"}["xmknmahpbe"]}=$this->getStringForGroup(${$wqnwiwatrvd},${${"GLOBALS"}["wnoruoh"]});if(count($ret[1])==0){$otlzguzh="ret";${$otlzguzh}[1]=null;}}}return${$xkqnwrkl};}public function buildSearch($filter,$otype='str'){$rbgcggqolm="ret";${$rbgcggqolm}=$this->_buildSearch(null,${${"GLOBALS"}["bxykmk"]});if(${${"GLOBALS"}["ibrervv"]}==="str"){$yqlllctkh="s\x32a";$hguakkshvf="csa";$zcouomxxep="i";$ihevdg="csa";$xpxkrhh="ret";$hpfhuaukvzh="i";$rtdpndbgz="s";${"GLOBALS"}["nyolyaj"]="i";${${"GLOBALS"}["tmmymefrg"]}=explode("?",${$xpxkrhh}[0]);${${"GLOBALS"}["luysyssdo"]}=count(${${"GLOBALS"}["tmmymefrg"]});${${"GLOBALS"}["ygmrjmrkgph"]}="";for(${${"GLOBALS"}["nyolyaj"]}=0;${$hpfhuaukvzh}<${$hguakkshvf}-1;${$zcouomxxep}++){$ilrhsrannvy="i";${${"GLOBALS"}["ygmrjmrkgph"]}.=${${"GLOBALS"}["tmmymefrg"]}[${$ilrhsrannvy}]." '".$ret[1][${${"GLOBALS"}["gfiapwq"]}]."' ";}${${"GLOBALS"}["ygmrjmrkgph"]}.=${$yqlllctkh}[${$ihevdg}-1];return${$rtdpndbgz};}return$ret;
	}
	protected function _setSQL()
	{
		$sqlId=false;
		if($this->readFromXML==true&&strlen($this->SelectCommand)>0)
		{
			$sqlId=$this->getSqlElement($this->SelectCommand);
		}
		else if($this->SelectCommand&&strlen($this->SelectCommand)>0)
		{
			$sqlId=$this->SelectCommand;
		}
		else if($this->table&&strlen($this->table)>0)
		{
			if($this->dbtype=="mongodb")
			{
				$sqlId=$this->table;
			}
			else
			{
				$sqlId="SELECT * FROM ".(string)$this->table;
			}
		}
		if($this->dbtype=="mongodb")
		{
			$sqlId=$this->pdo->selectCollection($sqlId);
		}
		return$sqlId;
	}
	public function getUserDate(){return$this->userdateformat;}public function setUserDate($newformat){$qxeexjt="newformat";$this->userdateformat=${$qxeexjt};}public function getUserTime(){return$this->usertimeformat;}public function setUserTime($newformat){${"GLOBALS"}["hpjlbxjdwyb"]="newformat";$this->usertimeformat=${${"GLOBALS"}["hpjlbxjdwyb"]};}public function getDbDate(){return$this->dbdateformat;}public function setDbDate($newformat){$this->dbdateformat=${${"GLOBALS"}["kqnjil"]};}public function getDbTime(){return$this->dbtimeformat;}public function setDbTime($newformat){$ldwdfjc="newformat";$this->dbtimeformat=${$ldwdfjc};}public function getGridParams(){return$this->GridParams;}public function setGridParams($_aparams){${"GLOBALS"}["vzdogovmhm"]="_aparams";$vsewbvlubkf="_aparams";if(is_array(${$vsewbvlubkf})&&!empty(${${"GLOBALS"}["vzdogovmhm"]})){${"GLOBALS"}["obevncrbr"]="_aparams";$this->GridParams=array_merge($this->GridParams,${${"GLOBALS"}["obevncrbr"]});}}
	public function selectLimit($limsql='',$nrows=-1,$offset=-1,array$params=null,$order='',$sort='')
	{
		$sql=null;
		$sqlId=strlen($limsql)>0?$limsql:$this->_setSQL();
		if(!$sqlId)
		{
			return false;
		}
		$ret=$this->execute($sqlId,$params,$sql,true,${${"GLOBALS"}["yduhqorujui"]},$offset,$order,${${"GLOBALS"}["rseyknxmplx"]});
		if($ret)
		{
			$ret=jqGridDB::fetch_object($sql,true,$this->pdo);
			jqGridDB::closeCursor($sql);
			return$ret;
		}
		else
		{
			return$ret;
		}
	}
	public function queryGrid(array$summary=null,array$params=null,$echo=true)
	{
		$sql=null;
		${"GLOBALS"}["pjokbuvhgiv"]="gridcnt";
		$kfscswfwnb="performcount";
		$sqlId=$this->_setSQL();
		if(!$sqlId)
		{
			return false;
		}
		$page=(int)jqGridUtils::GetParam($this->GridParams["page"],"\x31");
		$limit=(int)jqGridUtils::GetParam($this->GridParams["rows"],"\x320");
		$sidx=jqGridUtils::GetParam($this->GridParams["sort"],"");
		$ziroxhd="total_pages";
		$sord=jqGridUtils::GetParam($this->GridParams["order"],"");
		$search=jqGridUtils::GetParam($this->GridParams["search"],"false");
		${"GLOBALS"}["sylndtzjvuy"]="gridsrearch";
		$totalrows=jqGridUtils::GetParam($this->GridParams["totalrows"],"");
		if($this->parseSort)
		{
			$sord=preg_replace("/[^a-zA-\x5a0-\x39]/","",$sord);
			$sidx=preg_replace("/[^a-zA-Z0-\x39. _,()]/","",$sidx);
		}
		${$kfscswfwnb}=true;
		${${"GLOBALS"}["pjokbuvhgiv"]}=false;
		${${"GLOBALS"}["sylndtzjvuy"]}="1";
		if($this->cacheCount)
		{
			${"GLOBALS"}["ihnstyrv"]="gridcnt";
			${"GLOBALS"}["nqdfkzhb"]="performcount";
			${"GLOBALS"}["iyrbvsmwph"]="gridsrearch";
			${${"GLOBALS"}["ihnstyrv"]}=jqGridUtils::GetParam("grid_recs",false);
			${${"GLOBALS"}["iyrbvsmwph"]}=jqGridUtils::GetParam("grid_search","1");
			if(${${"GLOBALS"}["oyqmlxy"]}&&(int)${${"GLOBALS"}["oyqmlxy"]}>=0)
				${${"GLOBALS"}["nqdfkzhb"]}=false;
		}
		if($search=="true")
		{
			if($this->dbtype=="mongodb")
			{
				$params=jqGridDB::_mongoSearch($params,$this->GridParams,$this->encoding,$this->datearray,$this->mongointegers);
			}
			else
			{
				$gqwpsximw="sGrid";
				${$gqwpsximw}=$this->_buildSearch($params);
				if($this->optimizeSearch===true||$this->dbtype=="array")
				{
					$tsoliqc="whr";
					${$tsoliqc}="";
					if($sGrid[0])
					{
						if(preg_match("/\x5cs+WHERE\\s+/is",$sqlId))
						{
							$whr=" AND ".$sGrid[0];
						}
						else
						{
							$whr=" WHERE ".$sGrid[0];
						}
					}
					$sqlId.=$whr;
				}
				else
				{
					$whr=$sGrid[0]?" WHERE ".$sGrid[0]:"";
					$sqlId="SELECT * FROM (".$sqlId.") gridsearch".$whr;
				}
				$params=$sGrid[1];
				if($this->cacheCount&&$gridsrearch!="-\x31")
				{
					$dkwmdotnnd="whr";
					$kbebfehbyzn="params";
					$tmps=crc32(${$dkwmdotnnd}."data".implode(" ",${$kbebfehbyzn}));
					$boimpkittm="tmps";
					if($gridsrearch!=$tmps)
					{
						$performcount=true;
					}
					$gridsrearch=${$boimpkittm};
				}
			}
		}
		else
		{
			if($this->cacheCount&&$gridsrearch!="-1")
			{
				if($gridsrearch!="1")
				{
					$performcount=true;
				}
			}
		}
		$performcount=$performcount&&$this->performcount;
		if($performcount)
		{
			if($this->dbtype=="mongodb")
			{
				${"GLOBALS"}["yxsoeb"]="summary";
				$qryData=jqGridDB::_mongocount($sqlId,$params,${${"GLOBALS"}["yxsoeb"]});
			}
			else
			{
				$qryData=$this->_getcount($sqlId,$params,$summary);
			}
			if(is_object($qryData))
			{
				if(!isset($qryData->countr))
				{
					$qryData->countr=null;
				}
				if(!isset($qryData->COUNTR))
				{
					$qryData->COUNTR=null;
				}
				$count=$qryData->COUNTR?$qryData->COUNTR:($qryData->countr?$qryData->countr:0);
			}
			else
			{
				$count=isset($qryData["COUNTR"])?$qryData["COUNTR"]:0;
			}
		}
		else
		{
			$count=$gridcnt;
		}
		if($count>0)
		{
			$total_pages=ceil($count/$limit);
		}
		else
		{
			$count=0;
			$total_pages=0;
			$page=0;
		}
		if($page>${$ziroxhd})
		{
			$page=$total_pages;
		}
		$start=$limit*$page-$limit;
		if($start<0)
		{
			$start=0;
		}
		$result=new stdClass();
		if(is_array($summary))
		{
			if(is_array($qryData))
			{
				unset($qryData["COUNTR"]);
			}
			else
			{
				unset($qryData->COUNTR,$qryData->countr);
			}
			foreach($qryData as${${"GLOBALS"}["mkvvnlsckeh"]}=>${${"GLOBALS"}["dncmjohqwo"]})
			{
				${"GLOBALS"}["hrjlgvcbi"]="v";
				if(${${"GLOBALS"}["dncmjohqwo"]}==null)
				{
					$v=0;
				}
				$result->userdata[${${"GLOBALS"}["mkvvnlsckeh"]}]=${${"GLOBALS"}["hrjlgvcbi"]};
			}
		}
		if($this->cacheCount)
		{
			$result->userdata["grid_recs"]=$count;
			$result->userdata["grid_search"]=$gridsrearch;
			$result->userdata["outres"]=$performcount;
		}
		if($this->userdata)
		{
			if(!isset($result->userdata))
			{
				$result->userdata=array();
			}
			$result->userdata=jqGridUtils::array_extend($result->userdata,$this->userdata);
		}
		$result->records=$count;
		$result->page=$page;
		$result->total=$total_pages;
		$uselimit=true;
		if($totalrows)
		{
			$totalrows=(int)$totalrows;
			if(is_int($totalrows))
			{
				if($totalrows===-1)
				{
					$uselimit=false;
				}
				else if($totalrows>0)
				{
					$limit=$totalrows;
				}
			}
		}
		if($this->dbtype!=="mongodb"&&$this->dbtype!=="sqlsrv"&&$this->dbtype!=="odbcsqlsrv")
		{
			if($sidx)
			{
				$sqlId.=" ORDER BY ".$sidx." ".$sord;
			}
		}
		$ret=$this->execute($sqlId,$params,$sql,$uselimit,$limit,$start,$sidx,$sord);
		if($ret)
		{
			$result->rows=jqGridDB::fetch_object($sql,true,$this->pdo);
			jqGridDB::closeCursor($sql);
			if($this->customClass)
			{
				try{
					$result=call_user_func(array($this->customClass,$this->customFunc),$result,$this->pdo);
				}
				catch(Exception$e)
				{
					echo"Can not call the method class - ".$e->getMessage();
				}
			}
			else if(function_exists($this->customFunc))
			{
				$ifcxgmu="result";
				$result=call_user_func($this->customFunc,${$ifcxgmu},$this->pdo);
			}
			if($echo)
			{
				$this->_gridResponse($result,jqGridUtils::GetParam("callback",false));
			}
			else
			{
				if($this->debug)
				{
					$this->debugout();
				}
				return$result;
			}
		}
		else
		{
			echo"Could not execute query!\x21\x21";
		}
		if($this->debug)
			$this->debugout();
	}
	public function getSqlQuery(){return$this->select;}public function getQueryParams(){return$this->params;}
	protected function _rs($params=null,$summary=null,$excel=false){
		${"GLOBALS"}["odeiirmyo"]="sqlId";
		$ottmudhkuhx="sidx";
		${"GLOBALS"}["liiwngcpt"]="sidx";
		$kstwnlvpcie="sord";
		if($this->ExportCommand&&strlen($this->ExportCommand)>0){
			$sqlId=$this->ExportCommand;
		}
		else{
			$sqlId=$this->_setSQL();
		}
		if(!${${"GLOBALS"}["odeiirmyo"]}){
			return false;
		}
		${"GLOBALS"}["jdtdrmmm"]="sord";
		$sidx=jqGridUtils::GetParam($this->GridParams["sort"],"");
		${${"GLOBALS"}["jdtdrmmm"]}=jqGridUtils::GetParam($this->GridParams["order"],"");
		$sgiwjblxtxe="summary";
		$search=jqGridUtils::GetParam($this->GridParams["search"],"false");
		$sord=preg_replace("/[^a-zA-\x5a0-\x39]/","",${$kstwnlvpcie});
		${${"GLOBALS"}["liiwngcpt"]}=preg_replace("/[^a-zA-\x5a0-9. _,]/","",${$ottmudhkuhx});
		if($search=="true"){
			if($this->dbtype=="mongodb"){
				$params=jqGridDB::_mongoSearch($params,$this->GridParams,$this->encoding,$this->datearray,$this->mongointegers);
			}
			else{
				${"GLOBALS"}["hbubemj"]="params";
				${"GLOBALS"}["oobbgagi"]="sGrid";
				${"GLOBALS"}["iisrzjwmrxg"]="params";
				$sGrid=$this->_buildSearch(${${"GLOBALS"}["hbubemj"]});
				if($this->dbtype=="array"){
					$szduyohq="whr";
					${$szduyohq}="";
					if($sGrid[0]){
						${"GLOBALS"}["eknlxnewua"]="sqlId";
						if(preg_match("/\x5cs+WHERE\\s+/is",${${"GLOBALS"}["eknlxnewua"]})){
							$whr=" AND ".$sGrid[0];
						}
						else{
							${"GLOBALS"}["khdqdhwmiy"]="whr";
							$dpspdod="sGrid";
							${${"GLOBALS"}["khdqdhwmiy"]}=" WHERE ".${$dpspdod}[0];
						}
					}
					$sqlId.=$whr;
				}
				else{
					${"GLOBALS"}["tgsxeqdjcf"]="sqlId";
					$whr=$sGrid[0]?" WHERE ".$sGrid[0]:"";
					$sqlId="SELECT * FROM (".${${"GLOBALS"}["tgsxeqdjcf"]}.") gridsearch".$whr;
				}
				${${"GLOBALS"}["iisrzjwmrxg"]}=${${"GLOBALS"}["oobbgagi"]}[1];
			}
		}
		if($this->dbtype!=="mongodb"&&$this->dbtype!=="sqlsrv"&&$this->dbtype!=="odbcsqlsrv"){
			if($sidx){
				$sqlId.=" ORDER BY ".$sidx." ".$sord;
			}
		}
		if(is_array(${$sgiwjblxtxe})){
			${"GLOBALS"}["otmzfikv"]="v";
			if($this->dbtype=="mongodb"){
				$ymiigs="params";
				$qryData=jqGridDB::_mongocount($sqlId,${$ymiigs},$summary);
			}else{
				${"GLOBALS"}["xqzcxo"]="qryData";
				$xjgoylgoz="summary";
				${${"GLOBALS"}["xqzcxo"]}=$this->_getcount($sqlId,$params,${$xjgoylgoz});
			}
			${"GLOBALS"}["wssakfdwd"]="qryData";
			unset($qryData->COUNTR,$qryData->countr);
			foreach(${${"GLOBALS"}["wssakfdwd"]} as${${"GLOBALS"}["mkvvnlsckeh"]}=>${${"GLOBALS"}["otmzfikv"]}){
				${"GLOBALS"}["qxzvkvdjxip"]="v";
				if(${${"GLOBALS"}["dncmjohqwo"]}==null){
					$khshjlicc="v";
					${$khshjlicc}=0;
				}
				$this->tmpvar[${${"GLOBALS"}["mkvvnlsckeh"]}]=${${"GLOBALS"}["qxzvkvdjxip"]};
			}
		}
		if($this->userdata){
			if(!$this->tmpvar){
				$this->tmpvar=array();
			}
			$this->tmpvar=jqGridUtils::array_extend($this->tmpvar,$this->userdata);
		}
		if($this->debug){
			$this->logQuery($sqlId,$params);
			$this->debugout();
		}
		$this->execute($sqlId,$params,$sql,true,$this->gSQLMaxRows,0,$sidx,$sord);
		return$sql;
	}
	public function querySubGrid($params,$echo=true){if($this->SubgridCommand&&strlen($this->SubgridCommand)>0){$bdcnmslio="params";$jxucook="result";${$jxucook}=new stdClass();$result->rows=$this->queryForObject($this->SubgridCommand,${$bdcnmslio},true);if($echo){${"GLOBALS"}["bsqvsfwucd"]="result";$this->_gridResponse(${${"GLOBALS"}["bsqvsfwucd"]},jqGridUtils::GetParam("callback",false));}else{${"GLOBALS"}["pveiblp"]="result";return${${"GLOBALS"}["pveiblp"]};}}}
	protected function _gridResponse($response,$callback=null)
	{
		if($this->dataType=="xml")
		{
			if(isset($response->records))
			{
				$response->rows["records"]=$response->records;
				unset($response->records);
			}
			if(isset($response->total))
			{
				$response->rows["total"]=$response->total;
				unset($response->total);
			}
			if(isset($response->page))
			{
				$response->rows["page"]=$response->page;
				unset($response->page);
			}
			if(stristr($_SERVER["HTT\x50_ACCE\x50T"],"application/xhtml+xml"))
			{
				header("Content-type: application/xhtml+xml;charset=",$this->encoding);
			}
			else
			{
				header("Content-type: text/xml;charset=".$this->encoding);
			}
			echo jqGridUtils::toXml(${${"GLOBALS"}["wxlngg"]},"root",null,$this->encoding,$this->xmlCDATA);
		}
		else if($this->dataType=="json"||$this->dataType=="jsonp")
		{
			${"GLOBALS"}["wkrvryiykgwg"]="jsonp";
			$iqgagdjo="jsonp";
			${$iqgagdjo}=$this->dataType=="jsonp"&&${${"GLOBALS"}["uhshmndtq"]};
			if(${${"GLOBALS"}["wkrvryiykgwg"]})
			{
				header("Access-Control-Allow-Origin: *");
			}
			header("Content-type: text/x-json;charset=".$this->encoding);
			if(function_exists("json_encode")&&strtolower($this->encoding)=="utf-\x38")
			{
				${"GLOBALS"}["nuvwatxa"]="jsonp";
				if(${${"GLOBALS"}["nuvwatxa"]})
				{
					echo${${"GLOBALS"}["uhshmndtq"]}."(".json_encode(${${"GLOBALS"}["wxlngg"]}).")";
				}
				else
				{
					${"GLOBALS"}["pwepbkrp"]="response";
					echo json_encode(${${"GLOBALS"}["pwepbkrp"]});
				}
			}
			else
			{
				if(${${"GLOBALS"}["lmduekgr"]})
				{
					$xukhajsbbpf="callback";
					${"GLOBALS"}["qmbnalsnx"]="response";
					echo${$xukhajsbbpf}."(".jqGridUtils::encode(${${"GLOBALS"}["qmbnalsnx"]}).")";
				}
				else
				{
					${"GLOBALS"}["siwivtrsl"]="response";
					echo jqGridUtils::encode(${${"GLOBALS"}["siwivtrsl"]});
				}
			}
		}
	}
	public function addUserData($adata){$zpjgsygddplq="adata";if(is_array(${${"GLOBALS"}["qjeurszu"]}))$this->userdata=${$zpjgsygddplq};}
}