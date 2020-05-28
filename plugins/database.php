<?php
##################################################################################
///////////////////////////////////////MYSQL//////////////////////////////////////
##################################################################################

$servername = "localhost";
$username = "paridevprojects";
$password = "";
$database = "my_paridevprojects";
$query = mysqli_connect($servername, $username, $password, $database);

date_default_timezone_set('Europe/Rome');

if (!$query) {
	echo"DB ERROR";
	die;
}

##################################################################################
///////////////////////////////////////IS/////////////////////////////////////////
##################################################################################

//ADMIN (TRUE, FALSE)
function isAdmin($tgid) {
  global $query;
		$action = "SELECT * FROM AntiScammerTG_Bot_admin WHERE tgid = '$tgid'";
		$result = mysqli_query($query, $action);
		if (mysqli_num_rows($result) > 0) {
				return true;
		} else {
			return false;
		}
		mysqli_close($query);
}

//VIP (TRUE, FALSE)
function isVip($tgid) {
  global $query;
		$action = "SELECT * FROM AntiScammerTG_Bot_vip WHERE tgid = '$tgid'";
		$result = mysqli_query($query, $action);
		if (mysqli_num_rows($result) > 0) {
				return true;
		} else {
			return false;
		}
		mysqli_close($query);
}

//MEMBRO (TRUE, FALSE)
function isMembro($tgid) {
  global $query;
		$action = "SELECT * FROM AntiScammerTG_Bot_membri WHERE tgid = '$tgid'";
		$result = mysqli_query($query, $action);
		if (mysqli_num_rows($result) > 0) {
				return true;
		} else {
			return false;
		}
		mysqli_close($query);
}

//GROUP (TRUE, FALSE)
function isGroup($tgid) {
  global $query;
		$action = "SELECT * FROM AntiScammerTG_Bot_group WHERE tgid = '$tgid'";
		$result = mysqli_query($query, $action);
		if (mysqli_num_rows($result) > 0) {
				return true;
		} else {
			return false;
		}
		mysqli_close($query);
}

//SCAMMER (TRUE, FALSE)
function isBanned($tgid) {
	global $query;
		$action = "SELECT * FROM AntiScammerTG_Bot_ban WHERE tgid = '$tgid'";
		$result = mysqli_query($query, $action);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				if ($row["tgid"] === $tgid) {
					return true;
				} else{
					return false;
				}
			}
		} else {
			return false;
		}
		mysqli_close($query);
}

//ADMIN (TRUE, FALSE)
function isUser($tgid) {
  global $query;
		$action = "SELECT * FROM AntiScammerTG_Bot_users WHERE tgid = '$tgid'";
		$result = mysqli_query($query, $action);
		if (mysqli_num_rows($result) > 0) {
				return true;
		} else {
			return false;
		}
		mysqli_close($query);
}

##################################################################################
///////////////////////////////////////ADD-DEL////////////////////////////////////
##################################################################################

//ADMIN
function addAdmin($tgid) {
  global $query;
	$action = "INSERT INTO AntiScammerTG_Bot_admin (id, tgid) VALUES (NULL, '$tgid')";
  if (!isAdmin($tgid)) {
    if (mysqli_query($query, $action)) {
      return true;
  	} else {
      return false;
  	}
  } else {
    return false;
  }
  mysqli_close($query);
}

function delAdmin($tgid) {
  global $query;
		$action ="DELETE FROM AntiScammerTG_Bot_admin WHERE tgid = '$tgid'";
    if (isAdmin($tgid)) {
			if (mysqli_query($query, $action)) {
        return true;
			} else {
        return false;
			}
		} else {
      return false;
		}
    mysqli_close($query);
}

//VIP
function addVip($tgid) {
  global $query;
		$action = "INSERT INTO AntiScammerTG_Bot_vip (id, tgid) VALUES (NULL, '$tgid')";
      if (!isVip($tgid)) {
        if (mysqli_query($query, $action)) {
          return true;
  			} else {
          return false;
  			}
      } else {
        return false;
      }
      mysqli_close($query);
}

function delVip($tgid) {
  global $query;
		$action ="DELETE FROM AntiScammerTG_Bot_vip WHERE tgid = '$tgid'";
    if (isVip($tgid)) {
			if (mysqli_query($query, $action)) {
        return true;
			} else {
        return false;
			}
		} else {
      return false;
		}
    mysqli_close($query);
}

//MEMBRI
function addMembro($tgid) {
  global $query;
		$action = "INSERT INTO AntiScammerTG_Bot_membri (id, tgid) VALUES (NULL, '$tgid')";
      if (!isMembro($tgid)) {
        if (mysqli_query($query, $action)) {
          return true;
  			} else {
          return false;
  			}
      } else {
        return false;
      }
      mysqli_close($query);
}

function delMembro($tgid) {
  global $query;
		$action ="DELETE FROM AntiScammerTG_Bot_membri WHERE tgid = '$tgid'";
    if (isMembro($tgid)) {
			if (mysqli_query($query, $action)) {
        return true;
			} else {
        return false;
			}
		} else {
      return false;
		}
    mysqli_close($query);
}


//GRUPPI
function addGroup($tgid) {
  global $query;
		$action = "INSERT INTO AntiScammerTG_Bot_group (id, tgid) VALUES (NULL, '$tgid')";
      if (!isGroup($tgid)) {
        if (mysqli_query($query, $action)) {
          return true;
  			} else {
          return false;
  			}
      } else {
        return false;
      }
      mysqli_close($query);
}

function delGroup($tgid) {
  global $query;
		$action = "DELETE FROM AntiScammerTG_Bot_group WHERE tgid = '$tgid'";
    if (isGroup($tgid)) {
			if (mysqli_query($query, $action)) {
        return true;
			} else {
        return false;
			}
		} else {
      return false;
		}
    mysqli_close($query);
}

//BANNED
function addBanned($tgid, $prove) {
  global $query;
		$action = "INSERT INTO AntiScammerTG_Bot_ban (id, tgid, prove) VALUES (NULL, '$tgid', '$prove')";
      if (!isBanned($tgid)) {
        if (mysqli_query($query, $action)) {
          return true;
  			} else {
          return mysqli_error($query);
  			}
      } else {
        return false;
      }
  	mysqli_close($query);
}

function delBanned($tgid) {
  global $query;
		$action ="DELETE FROM AntiScammerTG_Bot_ban WHERE tgid = '$tgid'";
    if (isBanned($tgid)) {
			if (mysqli_query($query, $action)) {
        return true;
			} else {
        return false;
			}
		} else {
      return false;
		}
    mysqli_close($query);
}

//BANNED
function addUser($tgid) {
  global $query;
	$action = "INSERT INTO AntiScammerTG_Bot_users (id, tgid, step) VALUES (NULL, '$tgid', '0')";
  if (!isUser($tgid)) {
    if (mysqli_query($query, $action)) {
      return true;
  	} else {
      return mysqli_error($query);
  	}
  } else {
    return false;
  }
  mysqli_close($query);
}

function delUser($tgid) {
  global $query;
		$action ="DELETE FROM AntiScammerTG_Bot_users WHERE tgid = '$tgid'";
    if (isUser($tgid)) {
			if (mysqli_query($query, $action)) {
        return true;
			} else {
        return false;
			}
		} else {
      return false;
		}
    mysqli_close($query);
}


##################################################################################
///////////////////////////////////////TOTAL//////////////////////////////////////
##################################################################################

//ADMIN
function totalAdmin() {
  global $query;
		$action = "SELECT * FROM AntiScammerTG_Bot_admin";
		$result = mysqli_query($query, $action);
		return mysqli_num_rows($result);
		mysqli_close($query);
}

//VIP
function totalVip() {
  global $query;
		$action = "SELECT * FROM AntiScammerTG_Bot_vip";
		$result = mysqli_query($query, $action);
		return mysqli_num_rows($result);
		mysqli_close($query);
}

//GRUPPI
function totalGroup() {
  global $query;
		$action = "SELECT * FROM AntiScammerTG_Bot_group";
		$result = mysqli_query($query, $action);
		return mysqli_num_rows($result);
		mysqli_close($query);
}

//SCAMMER
function totalBanned() {
  global $query;
		$action = "SELECT * FROM AntiScammerTG_Bot_ban";
		$result = mysqli_query($query, $action);
		return mysqli_num_rows($result);
		mysqli_close($query);
}

##################################################################################
////////////////////////////////////////MSGID/////////////////////////////////////
##################################################################################

function updateMsgid($msg_id) {
	global $query;
	$action = "UPDATE AntiScammerTG_Bot_channel SET post_id='$msg_id' WHERE id='1'";
	if (mysqli_query($query, $action)) {
			return true;
		} else {
			return false;
			echo mysqli_error($query);
	}
}

function getMsgid() {
	global $query;
	$action = "SELECT * FROM AntiScammerTG_Bot_channel WHERE id = '1'";
	$result = mysqli_query($query, $action);
	if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
					return $row["post_id"];
			}
	} else {
			return false;
	}
}


function arrayGetGroups() {
	global $query;
	$action = "SELECT * FROM AntiScammerTG_Bot_group";
	$result = mysqli_query($query, $action);
	if (mysqli_num_rows($result) > 0) {
	  for ($i=0; $i < mysqli_num_rows($result); $i++) {
	    $row = mysqli_fetch_assoc($result);
	    $array[] = $row["tgid"];
	  }
	}
	return $array;
}

##################################################################################
//////////////////////////////////////ALTRO///////////////////////////////////////
##################################################################################


//RETURN TEXT (PROVE)
function getProof($scammerID) {
	global $query;
	$action = "SELECT * FROM AntiScammerTG_Bot_ban WHERE tgid = '$scammerID'";
	$result = mysqli_query($query, $action);
	while($row = mysqli_fetch_assoc($result)) {
			return $row["prove"];
	}
}

function delStep($tgid) {
	global $query;
	$action = "UPDATE AntiScammerTG_Bot_users SET step='0' WHERE tgid='$tgid'";
	if (mysqli_query($query, $action)) {
			return true;
		} else {
			return false;
			echo mysqli_error($query);
	}
}

function addStep($tgid) {
	global $query;
	$action = "UPDATE AntiScammerTG_Bot_users SET step='1' WHERE tgid='$tgid'";
	if (mysqli_query($query, $action)) {
			return true;
		} else {
			return false;
			echo mysqli_error($query);
	}
}

function getStep($tgid) {
	global $query;
	$action = "SELECT * FROM AntiScammerTG_Bot_users WHERE tgid = '$tgid'";
	$result = mysqli_query($query, $action);
	if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
					return $row["step"];
			}
	} else {
			return false;
	}
}

##################################################################################
///////////////////////////////////DIOPORCO///////////////////////////////////////
##################################################################################

function addRequestBan($ID, $USERNAME, $PROVE, $NOME, $from_id, $from_username, $randomString) {
	global $query;
	$action = "INSERT INTO AntiScammerTG_Bot_ban_request (id, tgid, nome, username, from_id, from_username, prove, randomString) VALUES (NULL, '$ID', '$NOME', '$USERNAME', '$from_id', '$from_username', '$PROVE', '$randomString')";
	if (mysqli_query($query, $action)) {
		return true;
	} else {
		return mysqli_error($query);
	}
}

/*function lastrandomString() {
	global $query;
	$action = "SELECT * FROM AntiScammerTG_Bot_ban_request";
	$result = mysqli_query($query, $action);
	if (mysqli_num_rows($result) > 0) {
	  for ($i=0; $i < mysqli_num_rows($result); $i++) {
	    $row = mysqli_fetch_assoc($result);
	    $array[] = $row["id"];
	  }
	}
	$a = min($array);
	$action = "SELECT * FROM AntiScammerTG_Bot_ban_request ORDER BY id DESC LIMIT 1";
	$result = mysqli_query($query, $action);
	while($row = mysqli_fetch_assoc($result)) {
		return $row["randomString"];
	}
}*/

function lastrandomstring() {
	global $query;
	$action = "SELECT * FROM AntiScammerTG_Bot_ban_request ORDER BY id DESC LIMIT 1";
	$result = mysqli_query($query, $action);
	if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
					return $row["randomString"];
			}
	} else {
			return false;
	}
}

function getRequestID($randomString) {
	global $query;
	$action = "SELECT * FROM AntiScammerTG_Bot_ban_request WHERE randomString = '$randomString'";
	$result = mysqli_query($query, $action);
	if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
					return $row["tgid"];
			}
	} else {
			return false;
	}
}

function getRequestUSERNAME($randomString) {
	global $query;
	$action = "SELECT * FROM AntiScammerTG_Bot_ban_request WHERE randomString = '$randomString'";
	$result = mysqli_query($query, $action);
	if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
					return $row["username"];
			}
	} else {
			return false;
	}
}

function getRequestPROVE($randomString) {
	global $query;
	$action = "SELECT * FROM AntiScammerTG_Bot_ban_request WHERE randomString = '$randomString'";
	$result = mysqli_query($query, $action);
	if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
					return $row["prove"];
			}
	} else {
			return false;
	}
}

function getRequestNOME($randomString) {
	global $query;
	$action = "SELECT * FROM AntiScammerTG_Bot_ban_request WHERE randomString = '$randomString'";
	$result = mysqli_query($query, $action);
	if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
					return $row["nome"];
			}
	} else {
			return false;
	}
}

function getRequestfrom_id($randomString) {
	global $query;
	$action = "SELECT * FROM AntiScammerTG_Bot_ban_request WHERE randomString = '$randomString'";
	$result = mysqli_query($query, $action);
	if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
					return $row["from_id"];
			}
	} else {
			return false;
	}
}

function getRequestfrom_username($randomString) {
	global $query;
	$action = "SELECT * FROM AntiScammerTG_Bot_ban_request WHERE randomString = '$randomString'";
	$result = mysqli_query($query, $action);
	if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
					return $row["from_username"];
			}
	} else {
			return false;
	}
}
