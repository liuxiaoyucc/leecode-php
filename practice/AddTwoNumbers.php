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
		$this->val = $val;
	}
}

class Solution {


	public function addTwoNumbers($l1, $l2)
	{
		$add = 0; // 进位数
		$list = new ListNode(0); // 返回结果
		$cur = $list;

		while ($l1 != null || $l2 != null) {
			$x = $l1 ? $l1->val : 0; // 左边数
			$y = $l2 ? $l2->val : 0; // 右边数

			// 相加, 并判断是否有进位

			$tmp_sum = $x + $y + $add; // 三者之和
			$val = $tmp_sum % 10;
			$add = intval($tmp_sum / 10); // 进位数

			$new = new ListNode($val);
			$cur->next = $new;
			$cur = $cur->next;
			if ($l1) {
				$l1 = $l1->next; // 重置$l1
			}
			if ($l2) {
				$l2 = $l2->next; // 重置$l2
			}
		}

		if ($add) { // 最后一位
			$cur->next = new ListNode(intval($add));
		}
		return $list->next;
	}
}

$list1 = new ListNode(5);
$list1->next = new ListNode(3);
$list1->next->next = new ListNode(9);

$list2 = new ListNode(6);
$list2->next = new ListNode(1);
$list2->next->next = new ListNode(4);

// $list1->next = new ListNode(4);
// print_r($list1);
// return;
$solution = new Solution;
$res = $solution->addTwoNumbers($list1, $list2);
print_r($res);