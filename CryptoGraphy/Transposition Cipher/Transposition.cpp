#include<bits/stdc++.h>

using namespace std;

class Transposition{
public:
    string encrypt(string text, int width){
        int len = text.length();
        int k = width - (len%width);
        if(k==width) k=0;
        len += k;
        while(k--){
            text += '*';
        }

        k = len/width;

        string cipher = "";

        for(int i=0;i<width;i++){
            for(int j=0;j<k; j++){
                cipher += text[width*j + i];
            }
        }

        return cipher;
    }

    string decrypt(string text, int width){
        int len = text.length(),k;
        k = len/width;

        string plain = "";

        for(int i=0;i<width;i++){
            for(int j=0;j<k; j++){
                plain += text[width*j + i];
            }
        }

        return plain;
    }

};

int main(){
    ifstream file("input.txt");
    string text = "",str;
    while(file >> str){
        text += str + ' ';
    }

    Transposition T;

    // Single Transposition cipher
    // int wid = 10;
    // string cipher = T.encrypt(text, wid);
    // cout << cipher << endl;

    // int rev_wid = cipher.length()/wid;
    // string plain = T.decrypt(cipher, rev_wid);
    // cout << plain << endl;


    // double Transposition cipher
    int wid = 10;
    string cipher = T.encrypt(text, wid);
    cout << cipher << endl;                 //1st encryption
    cipher = T.encrypt(cipher, wid);
    cout << cipher << endl;                 //2nd encryption


    int rev_wid = cipher.length()/wid;
    string plain = T.decrypt(cipher, rev_wid);
    cout << plain << endl;                  //1st decryption
    plain = T.decrypt(plain, rev_wid);
    cout << plain << endl;                  //2nd decryption
}