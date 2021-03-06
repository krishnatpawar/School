<?php

/**
 * The Teacher Model
 *
 * @author Hemant Mann
 */
class Educator extends Shared\Model {
    
    /**
     * @column
     * @readwrite
     * @type integer
     * @index
     */
    protected $_organization_id;

    /**
     * @column
     * @readwrite
     * @type integer
     * @index
     */
    protected $_user_id;

    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_location_id;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     */
    protected $_timetable = null;

}
