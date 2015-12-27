<?php
/**
 * The Grades Controller
 *
 * @author Hemant Mann
 */
use Framework\RequestMethods as RequestMethods;
use Shared\Markup as Markup;
use Framework\Registry as Registry;
use Framework\ArrayMethods as ArrayMethods;

class Grades extends School {
	
	/**
     * @before _secure, _school
     */
	public function add() {
		$this->setSEO(array("title" => "School | Add Grades"));
		$view = $this->getActionView();

		if (RequestMethods::post("action") == "addGrades") {
			$title = RequestMethods::post("title");
			$description = RequestMethods::post("description");

			foreach ($title as $key => $value) {
				$grade = new \Grade(array(
					"title" => Markup::checkValue($value),
					"description" => Markup::checkValue($description[$key]),
					"organization_id" => $this->organization->id
				));
				$grade->save();
			}

			$view->set("success", 'Classes added successfully! See <a href="/grades/manage">Manage Classes</a>');
		}
	}

    /**
     * @before _secure, _school
     */
	public function manage() {
		$this->setSEO(array("title" => "School | Manage Classes"));
		$view = $this->getActionView();

		$grades = \Grade::all(array("organization_id = ?" => $this->organization->id), array("*"), "title", "asc");
		$view->set("grades", $grades);
	}
}