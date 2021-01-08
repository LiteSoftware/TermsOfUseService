<?php

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="dp_logger")
 */

class LogItem {
    
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     * @ORM\Column(name="message", type="text")
     */
    private $message;

    /**
     * @ORM\Column(name="level", type="smallint")
     */
    private $level;

    /**
    * @ORM\Column(name="channel", type="string")
    */
    private $channel;

    /**
     * @ORM\Column(name="level_name", type="string", length=50)
     */
    private $levelName;

    /**
     * @ORM\Column(name="extra", type="array")
     */
    private $extra;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    public function getMessage() : string {
        return $this->message;
    }

    public function setMessage(string $message) {
        $this->message = $message;
    }

    public function getLevel() : int {
        return $this->level;
    }

    public function setLevel(int $level){
        $this->level = $level;
    }

    public function getLevelName() : string {
        return $this->levelName;
    }
    
    public function setLevelName(string $levelName) {
        $this->levelName = $levelName;
    }

    public function getChannel() : string {
        return $this->channel;
    }

    public function setChannel(string $channel) {
        $this->channel = $channel;

        return $this;
    }
    public function getExtra() : array {
        return $this->extra;
    }

    public function setExtra(array $extra) {
        $this->extra = $extra;
    }

    public function getCreatedAt() : datetime {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt) {
        $this->createdAt = $createdAt;
    }
}