<?php
// returns the mean of a number list
function mean($vals,$debug = 0)
{
        
    if(!is_array($vals))
    {
        return 0;
    }
    else
    {
    
        $val = arrayStripChar($vals);
        $num = count($val);
        $i = 0;
        $m = 0;
        for($i = 0; $i < $num; $i++)
        {
            $m += $val[$i];
        }
        
        $mean = $m / $num;
        
        return $mean;
    }
}

// returns the median of a number list
function median($vals)
{
    if(!is_array($vals))
    {
        return 0;
    }
    else
    {
        $val = arrayStripChar($vals);
        $num = count($val);
        rsort($val);
        $midNum = ($num + 1) / 2;
        if(is_float($midNum))
        {
            $M = round($midNum);
            
            if(isEvenNum($num - $midNum))
            {
                $mn = $M - 1;
                $mm = $mn - 1;
                $median = ($val[$mn] + $val[$mm]) / 2;
                return $median;
            }
            else
            {
                $median = $val[$M -1];
                return $median;
            }
        }
        else
        {
            if(isEvenNum($num - $midNum))
            {
                $mn = $midNum - 1;
                $mm = $mn - 1;
                $median = array('a' => $val[$mn],'b' => $val[$mm]);
                return $mm;
            }
            else
            {
                $median = $val[$midNum -1];
                return $median;
            }
        }
    }
}

// function strips all non numeric values from an array and returns a new array that is clipped of all strings and character indexes
function arrayStripChar($a)
{
    if(!is_array($a))
    {
        return 0;
    }
    else
    {
        $num = count($a);
        $i = 0;
        $j = 0;
        $rtn = 0;
        for ($i = 0; $i < $num; $i++)
        {
            if(!is_numeric($a[$i]))
            {
                unset($a[$i]);
            }
        }
        $n = array_values($a);
        
        return $n;
    }
}

// evaluates if a number is odd or not
function isOddNum($n)
{
    $odd = ($n % 2) ? 1 : 0;
    return $odd;
}

// evaluates if a number even not
function isEvenNum($n)
{
    $even = ($n % 2) ? 0 : 1;
    return $even;
}

function probability($n,$nR)
{
    if(!is_array($n))
    {
        if(!is_array($nR))
        {
            $prob = $n . ":" . $nR;
            
            return $prob;
        }
        else
        {
            $val = arrayStripChar($nR);
            $num = count($val);
            $i = 0;
            $p = 0;
            for($i = 0; $i < $num; $i++)
            {
                $p += $val[$i];
            }
            $prob = $n . ":" . $p;
            return $prob;
        }
    }
    else
    {
    
        if(!is_array($nR))
        {
            $nam = arrayStripChar($n);
            $nem = count($nam);
            $k = 0;
            $p = array();
            for($k = 0; $k < $nem; $k++)
            {
                $p[$k] = $nam[$k] . ":" . $nR;
            }
            return $p;
        }
        else
        {
            $nam = arrayStripChar($n);
            $nem = count($nam);
            $k = 0;
            $val = arrayStripChar($nR);
            $num = count($val);
            $i = 0;
            $p = 0;
            $c = array();
            for($i = 0; $i < $num; $i++)
            {
                $p += $val[$i];
            }
            for($k = 0; $k < $nem; $k++)
            {
                $c[$k] = $nam[$k] . ":" . $p;
            }
            return $c;  
        }   
    }
}
?>