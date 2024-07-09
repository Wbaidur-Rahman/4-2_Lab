import java.math.BigInteger;
import java.security.SecureRandom;

public class RSA {
    private final static SecureRandom secureRandom = new SecureRandom();

    private static BigInteger generatePublicKey(BigInteger phi) {
        BigInteger e = BigInteger.probablePrime(1024, secureRandom);
        while (!e.gcd(phi).equals(BigInteger.ONE) && e.compareTo(phi) < 0) {
            e = e.add(BigInteger.ONE);
        }
        return e;
    }

    private static BigInteger generatePrivateKey(BigInteger e, BigInteger phi){
        BigInteger d = e.modInverse(phi);
        return d;
    }

    private static byte[] encryptText(byte[] plaintext, BigInteger e, BigInteger n) {
        BigInteger m = new BigInteger(1, plaintext);
        BigInteger c = m.modPow(e, n);
        return c.toByteArray();
    }

    private static byte[] decryptText(byte[] cipherText, BigInteger d, BigInteger n) {
        BigInteger c = new BigInteger(1, cipherText);
        BigInteger m = c.modPow(d, n);
        return m.toByteArray();
    }

    public static void main(String[] args) {
        BigInteger p = BigInteger.probablePrime(1024, secureRandom);
        BigInteger q = BigInteger.probablePrime(1024, secureRandom);

        BigInteger n = p.multiply(q);
        BigInteger phi = p.subtract(BigInteger.ONE).multiply(q.subtract(BigInteger.ONE));

        BigInteger e = generatePublicKey(phi);
        BigInteger d = generatePrivateKey(e, phi);

        byte[] plaintext = "Hello, this is a rough situation".getBytes();
        byte[] cipherText = encryptText(plaintext, e, n);
        byte[] decipherText = decryptText(cipherText, d, n);

        System.out.println(new String(plaintext));
        System.out.println(new String(cipherText));
        System.out.println(new String(decipherText));
    }
}