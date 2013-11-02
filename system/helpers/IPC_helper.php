<?php

	$IPC_KEY = ftok("/home/john/temp/key",'a');
        $message_queue = msg_get_queue($IPC_KEY, 0666);
	

	if(!function_exists("packing")){
		function packing($mess_arr){
			$mess = "";
                        if(count($mess)>0){
                                $mess = implode(", ",$arr);
                        }
                        return $mess;
		}
	}

	if(!function_exists("unpacking")){
		function mess_unpacking($packing){
                        if(isset($packing)){
                                $arr = explode(', ',$packing);
                                $mess = array(
                                        'c_id' => $arr[0],
                                        'token' => $arr[1],
                                        'param' => $arr[2],
                                        'task_id' => $arr[3],
                                        'deadline' => $arr[4]
                                        );
                        }
                        return $mess;
                }
	}
	
	if(!function_exists("ipc_send")){
		function ipc_send($mess){
			@msg_send($message_queue,1,$mess);
		}
	}
		
?>
