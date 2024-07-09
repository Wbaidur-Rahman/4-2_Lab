#include<bits/stdc++.h>

using namespace std;

class OneTime{
public:
    string encrypt(string text, string random){
        string cipher = "";
        int k = 0;
        for(int i=0; i < text.length(); i++){
            if(text[i]==' ' || text[i] == '.') {cipher+=text[i]; continue;}

            if(text[i]>'Z'){
                // cout << text[i] << " " << random[i] << " " << (text[i]-'a'+(random[i]-'A'))%26<< endl;
                cipher += (char)('a' + (text[i]-'a'+(random[i]-'A'))%26);
            }
            else {
                cipher += (char)('A' + (text[i]-'A'+(random[i]-'A'))%26);
            }

        }

        return cipher;
    }

    string decrypt(string text, string random){
        string plain = "";
        int k = 0;
        for(int i=0; i < text.length(); i++){
            if(text[i]==' ' || text[i] == '.') {plain+=text[i]; continue;}

            if(text[i]>'Z'){
                plain += (char)('a' + (text[i]-'a'-(random[i]-'A')+26)%26);
            }
            else {
                plain += (char)('A' + (text[i]-'A'-(random[i]-'A')+26)%26);
            }
        }

        return plain;
    }

};

int main(){
    ifstream file("input.txt");
    string text="", str;  

    while(file >> str){
        text += str + ' ';
    }

    ifstream file1("random_chars.txt");
    string random;
    file1 >> random;

    cout << text << endl;

    OneTime O;

    string cipher = O.encrypt(text, random);
    cout << cipher << endl;

    string plain = O.decrypt(cipher, random);
    cout << plain << endl;

}