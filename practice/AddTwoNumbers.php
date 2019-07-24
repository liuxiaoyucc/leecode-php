<?php


/**
 * list
 */
class ListNode
{
	public $val = 0;
	public $next = null;
	function __construct($val)
	{
		$this->$val = $val;
	}
}

class Solution {


	public function addTwoNumbers($l1, $l2)
	{
		$add = 0;
		$list = new ListNode(0);
		$cur = $list;

		while ($l1 || $l2) {
			$x = $l1 ? $l1->val : 0;
			$y = $l2 ? $l2->val : 0;

			$val = ($x + $y + $add) % 10;
			$add = ($x + $y + $add) / 10;
			$new = new ListNode($val);
			$cur->next = $new;
			$cur = $cur->next;
			if ($l1) {
				$l1 = $l1->next;
			}
			if ($l2) {
				$l2 = $l2->next;
			}
		}
		if ($add) {
			$cur->next = new ListNode($add);
		}
		return $list->next;
	}
}

$solution = new Solution;
$res = $solution->addTwoNumbers(1,2);
print_r($res);