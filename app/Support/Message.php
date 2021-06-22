<?php


namespace LaraDev\Support;


class Message
{
    private $text;
    private $type;

    public function success(string $message): Message
    {
        $this->setType('success');
        $this->setText($message);
        return $this;
    }

    public function error(string $message): Message
    {
        $this->setType('error');
        $this->setText($message);
        return $this;
    }

    public function info(string $message): Message
    {
        $this->setType('info');
        $this->setText($message);

        return $this;
    }

    public function warning(string $message): Message
    {
        $this->setType('warning');
        $this->setText($message);

        return $this;
    }

    public function render()
    {
        return "<div class='message {$this->getType()}'>
                    {$this->getText()}
                </div>";
    }


    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }
}
