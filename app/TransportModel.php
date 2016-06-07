<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class TransportModel extends Model
{
     
    protected $primaryKey = 'TRANSPORT_ID';
    protected $table = 'transport';
    public $timestamps = false;
    public static function findTransport($type,$from,$to)
    {     
        if($type != "Any")
        {
          if($from == "Any" && $to == "Any")
          {
              $query = DB::select('SELECT T.TRANSPORT_NAME, T.TYPE, T.ADDRESS, T.CONTACT_INFO, C.TICKET_PRICE_PER_PERSON, C.TICKET_PRICE_PER_TRIP,
                   I.FROM_PLACE, I.TO_PLACE
                   FROM TRANSPORT T INNER JOIN
                   TRANSPORT_TRIP_CONNECTION C
                   ON(T.TRANSPORT_ID = C.TRANSPORT_ID)
                   INNER JOIN TRIP_INFORMATION I
                   ON(C.TRIP_ID = I.TRIP_ID)
                   WHERE T.TYPE = ?
                   ORDER BY T.TRANSPORT_NAME',[$type]); 
                    
          }
    
          elseif($from == "Any" && $to != "Any")
          {
              $query = DB::select('SELECT T.TRANSPORT_NAME, T.TYPE, T.ADDRESS, T.CONTACT_INFO, C.TICKET_PRICE_PER_PERSON, C.TICKET_PRICE_PER_TRIP,
                   I.FROM_PLACE, I.TO_PLACE
                   FROM TRANSPORT T INNER JOIN
                   TRANSPORT_TRIP_CONNECTION C
                   ON(T.TRANSPORT_ID = C.TRANSPORT_ID)
                   INNER JOIN TRIP_INFORMATION I
                   ON(C.TRIP_ID = I.TRIP_ID)
                   WHERE I.TO_PLACE =? and T.TYPE =?
                   ORDER BY T.TRANSPORT_NAME',[$to,$from]); 
                    
          }
    
          elseif($from != "Any" && $to == "Any")
          {
              $query = DB::select('SELECT T.TRANSPORT_NAME, T.TYPE, T.ADDRESS, T.CONTACT_INFO, C.TICKET_PRICE_PER_PERSON, C.TICKET_PRICE_PER_TRIP,
                   I.FROM_PLACE, I.TO_PLACE
                   FROM TRANSPORT T INNER JOIN
                   TRANSPORT_TRIP_CONNECTION C
                   ON(T.TRANSPORT_ID = C.TRANSPORT_ID)
                   INNER JOIN TRIP_INFORMATION I
                   ON(C.TRIP_ID = I.TRIP_ID)
                   WHERE I.FROM_PLACE =? and T.TYPE =?
                   ORDER BY T.TRANSPORT_NAME',[$from,$type]); 
                    
          }
    
          elseif($from != "Any" && $to != "Any")
          {
              $query =DB::select('SELECT T.TRANSPORT_NAME, T.TYPE, T.ADDRESS, T.CONTACT_INFO, C.TICKET_PRICE_PER_PERSON, C.TICKET_PRICE_PER_TRIP,
                   I.FROM_PLACE, I.TO_PLACE
                   FROM TRANSPORT T INNER JOIN
                   TRANSPORT_TRIP_CONNECTION C
                   ON(T.TRANSPORT_ID = C.TRANSPORT_ID)
                   INNER JOIN TRIP_INFORMATION I
                   ON(C.TRIP_ID = I.TRIP_ID)
                   WHERE I.FROM_PLACE =? and I.TO_PLACE =? and T.TYPE =?
                   ORDER BY T.TRANSPORT_NAME',[$from,$to,$type]); 
                    
          }
        }
    
        //type == Any
        else
        {
          if($from == "Any" && $to == "Any")
          {
              $query =DB::select('SELECT T.TRANSPORT_NAME, T.TYPE, T.ADDRESS, T.CONTACT_INFO, C.TICKET_PRICE_PER_PERSON, C.TICKET_PRICE_PER_TRIP,
                   I.FROM_PLACE, I.TO_PLACE
                   FROM TRANSPORT T INNER JOIN
                   TRANSPORT_TRIP_CONNECTION C
                   ON(T.TRANSPORT_ID = C.TRANSPORT_ID)
                   INNER JOIN TRIP_INFORMATION I
                   ON(C.TRIP_ID = I.TRIP_ID)
                   ORDER BY T.TRANSPORT_NAME');
                    
          }
    
          elseif($from == "Any" && $to != "Any")
          {
              $query =DB::select('SELECT T.TRANSPORT_NAME, T.TYPE, T.ADDRESS, T.CONTACT_INFO, C.TICKET_PRICE_PER_PERSON, C.TICKET_PRICE_PER_TRIP,
                   I.FROM_PLACE, I.TO_PLACE
                   FROM TRANSPORT T INNER JOIN
                   TRANSPORT_TRIP_CONNECTION C
                   ON(T.TRANSPORT_ID = C.TRANSPORT_ID)
                   INNER JOIN TRIP_INFORMATION I
                   ON(C.TRIP_ID = I.TRIP_ID)
                   WHERE I.TO_PLACE =?
                   ORDER BY T.TRANSPORT_NAME',[$to]); 
                    
          }
    
          elseif($from != "Any" && $to == "Any")
          {
              $query =DB::select('SELECT T.TRANSPORT_NAME, T.TYPE, T.ADDRESS, T.CONTACT_INFO, C.TICKET_PRICE_PER_PERSON, C.TICKET_PRICE_PER_TRIP,
                   I.FROM_PLACE, I.TO_PLACE
                   FROM TRANSPORT T INNER JOIN
                   TRANSPORT_TRIP_CONNECTION C
                   ON(T.TRANSPORT_ID = C.TRANSPORT_ID)
                   INNER JOIN TRIP_INFORMATION I
                   ON(C.TRIP_ID = I.TRIP_ID)
                   WHERE I.FROM_PLACE =?
                   ORDER BY T.TRANSPORT_NAME',[$from]); 
                    
          }
    
          elseif($from != "Any" && $to != "Any")
          {
              $query = DB::select('SELECT T.TRANSPORT_NAME, T.TYPE, T.ADDRESS, T.CONTACT_INFO, C.TICKET_PRICE_PER_PERSON, C.TICKET_PRICE_PER_TRIP,
                   I.FROM_PLACE, I.TO_PLACE
                   FROM TRANSPORT T INNER JOIN
                   TRANSPORT_TRIP_CONNECTION C
                   ON(T.TRANSPORT_ID = C.TRANSPORT_ID)
                   INNER JOIN TRIP_INFORMATION I
                   ON(C.TRIP_ID = I.TRIP_ID)
                   WHERE I.FROM_PLACE =? and I.TO_PLACE =?
                   ORDER BY T.TRANSPORT_NAME',[$from,$to]); 
                    
          }
        }
        return $query;
    }
    
    public static function insert_transport($transportName, $transportType, $address, $contactInfo)
	{
		
		
		$query = DB::insert('INSERT INTO TRANSPORT  (`TRANSPORT_ID`, `TRANSPORT_NAME`, `TYPE`, `ADDRESS`,`CONTACT_INFO`) 
					VALUES (?,?,?,?,?)',[NULL, 
						$transportName, $transportType,
						$address,
						$contactInfo 
						]);
	    
	}

	public static function insert_trip($from, $to)
	{
		
		
		$query = DB::insert('INSERT INTO TRIP_INFORMATION(`TRIP_ID`, `FROM_PLACE`, `TO_PLACE`) 
					VALUES (?,?,?)',[NULL, 
						$from, 
						$to
						]);
	}
        public static function insert_transport_trip_connection($transport_id, $trip_id, $pricePerTicket, $pricePerTrip, $starValue)
	{
		
		
		$query = DB::insert('INSERT INTO  transport_trip_connection (`TRANSPORT_ID`,`TRIP_ID`,`TICKET_PRICE_PER_PERSON` ,`TICKET_PRICE_PER_TRIP`,`RATING`) 
					VALUES(?,?,?,?,?)',[$transport_id, $trip_id,$pricePerTicket, $pricePerTrip, $starValue]);
		
                
             
	
	}

	public static function find_upazilla_id($upazilla, $district, $division)
	{
		
		$query = "select find_upazilla_id('$upazilla','$district','$division');";
		
		$upazilla_rows = mysqli_query($connection, $query);
		//confirm_query($upazilla_rows);

		$upazilla_row = mysqli_fetch_row($upazilla_rows);
		$upazilla_id = $upazilla_row[0];
		
		
		return $upazilla_id;
		
	}

	

        public static function find_transport_id($transportName, $transportType, $address)
	{
		
		
		$query = DB::select('Select TRANSPORT_ID 
				From TRANSPORT 
				Where TRANSPORT_NAME = ?
                                and TYPE = ?
				and ADDRESS = ?',[$transportName,$transportType,$address]);
				
		
		foreach($query as $q)
                {
		$id = $q->TRANSPORT_ID;
                return $id;
                }
		
		return 0;
        }
	public static function find_trip_id($from, $to)
	{
		global $connection;
		
		$query = DB::select('Select TRIP_ID 
				From TRIP_INFORMATION
				Where FROM_PLACE =?
				and TO_PLACE = ?',[$from,$to]);
				
		
		
		foreach($query as $q)
                {
		$id = $q->TRIP_ID;
                return $id;
                }
		
		return 0;
	}
   
}
