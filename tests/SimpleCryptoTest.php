<?php declare(strict_types=1);

use Nabeghe\SimpleCipher\SimpleCipher;

class SimpleCryptoTest extends \PHPUnit\Framework\TestCase
{
    public const SECRET = '0123456789';

    public function testString()
    {
        $data = 'nabeghe/simple-cipher';

        $encrypted = SimpleCipher::encrypt($data, self::SECRET);
        $this->assertNotSame($data, $encrypted);

        $decrypted = SimpleCipher::decrypt($encrypted, self::SECRET);
        $this->assertSame($data, $decrypted);
    }

    public function testStringDiffSecret()
    {
        $data = 'nabeghe/simple-cipher';

        $encrypted = SimpleCipher::encrypt($data, self::SECRET);
        $this->assertNotSame($data, $encrypted);

        $decrypted = SimpleCipher::decrypt($encrypted, '123');
        $this->assertNull($decrypted);
    }

    public function testArray()
    {
        $data = ['nabeghe/simple-cipher'];

        $encrypted = SimpleCipher::encrypt($data, self::SECRET);
        $this->assertNotSame($data, $encrypted);

        $decrypted = SimpleCipher::decrypt($encrypted, self::SECRET);
        $this->assertSame($data, $decrypted);
    }

    public function testObject()
    {
        $data = new stdClass();
        $data->name = 'nabeghe/simple-cipher';

        $encrypted = SimpleCipher::encrypt($data, self::SECRET);
        $this->assertNotSame($data, $encrypted);

        $decrypted = SimpleCipher::decrypt($encrypted, self::SECRET);
        $this->assertEquals($data, (object) $decrypted);
    }

    public function testInstanceMode()
    {
        $data = 'nabeghe/simple-cipher';

        $cipher = new SimpleCipher(self::SECRET);

        $encrypted = $cipher->encrypt($data);
        $this->assertNotSame($data, $encrypted);

        $decrypted = $cipher->decrypt($encrypted);
        $this->assertSame($data, $decrypted);
    }

    public function testDefaultSecret()
    {
        $data = 'nabeghe/simple-cipher';

        $cipher = new SimpleCipher();

        $encrypted = $cipher->encrypt($data);
        $this->assertNotSame($data, $encrypted);

        $decrypted = $cipher->decrypt($encrypted);
        $this->assertSame($data, $decrypted);

        //\Nabeghe\SimpleCipher\DefaultSecret::reest();
    }
}