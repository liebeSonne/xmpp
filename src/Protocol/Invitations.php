<?php
namespace Fabiang\Xmpp\Protocol;
use Fabiang\Xmpp\Util\XML;
/**
 * Protocol setting for Xmpp.
 *
 * @package Xmpp\Protocol
 * 
 * @see https://xmpp.org/extensions/xep-0249.html
 * 
 *   Example 1. A direct invitation
 *   <message
 *       from='crone1@shakespeare.lit/desktop'
 *       to='hecate@shakespeare.lit'>
 *     <x xmlns='jabber:x:conference'
 *        jid='darkcave@macbeth.shakespeare.lit'
 *        password='cauldronburn'
 *        reason='Hey Hecate, this is the place for all good witches!'/>
 *   </message>
 *   
 *   Example 2. A direct invitation that continues a one-to-one chat
 *   <message
 *       from='crone1@shakespeare.lit/desktop'
 *       to='hecate@shakespeare.lit'>
 *     <x xmlns='jabber:x:conference'
 *        continue='true'
 *        jid='darkcave@macbeth.shakespeare.lit'
 *        password='cauldronburn'
 *        reason='Hey Hecate, this is the place for all good witches!'
 *        thread='e0ffe42b28561960c6b12b944a092794b9683a38'/>
 *   </message>
 * 
 * @author liebeSonne
 *
 */
class Invitations implements ProtocolImplementationInterface
{
    protected $from;
    protected $to;
    protected $jid;
    protected $password;
    protected $reason;
    protected $continue;
    protected $thread;
    
    const CONTINUE_TRUE = 'true';
    const CONTINUE_FALSE = 'false';
    
    /**
     * Set message sender.
     *
     * @param string $from
     * @return $this
     */
    public function setFrom($from) {
        $this->from = (string) $from;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getFrom() {
        return $this->from;
    }
    
    /**
     * @param string $to
     * @return $this
     */
    public function setTo($to) {
        $this->to = (string) $to;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getTo() {
        return $this->to;
    }
    
    /**
     * @param string $jid
     * @return $this
     */
    public function setJID($jid) {
        $this->jid = (string) $jid;
        return $this;
    }
    /**
     * @return string
     */
    public function getJID() {
        return $this->jid;
    }
    /**
     * @param string $password
     * @return $this
     */
    public function setPassword($password) {
        $this->password = (string) $password;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }
    
    /**
     * 
     * @param string $reason
     * @return $this
     */
    public function setReason($reason) {
        $this->reason = (string) $reason;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getReason() {
        return $this->reason;
    }
    
    /**
     * See {@link self::CONTINUE_TRUE} and {@link self::CONTINUE_FALSE}
     * @param string $continue
     * @return $this
     */
    public function setContinue($continue) {
        $this->continue = (string) $continue;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getContinue() {
        return $this->continue;
    }
    
    /**
     * @param string $thread
     * @return $this
     */
    public function setThread($thread) {
        $this->thread = (string) $thread;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getThread() {
        return $this->thread;
    }
    
    /**
     * {@inheritDoc}
     */
    public function toString()
    {
        return XML::quoteMessage(
                '<message 
                    from="%s" 
                    to="%s">
                    <x
                    xmlns="jabber:x:conference"
                     jid="%s"
                     password="%s"
                     reason="%s"
                     continue="%s"
                     thread="%s"
                    />
                </message>',
                $this->getFrom(),
                $this->getTo(),
                $this->getJID(),
                $this->getPassword(),
                $this->getReason(),
                $this->getContinue(),
                $this->getThread()
        );
    }
}
