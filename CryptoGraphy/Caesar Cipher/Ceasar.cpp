#include<bits/stdc++.h>

using namespace std;

class Ceasar {
public:

    string Encrypt(string plaintxt){
        string cipher = "";
        for(auto it: plaintxt){
            if(it == ' ') {cipher += '#'; continue;}
            cipher += (char) ('A' + (it + 3 - 'A')%26);
        }

        return cipher;
    }

    string Decrypt(string ciphertxt){
        string plaintxt = "";
        for(auto it: ciphertxt){
            if(it == '#') {plaintxt+=' '; continue;}
            plaintxt += (char) ('A' + (it + 23 - 'A')%26);
        }

        return plaintxt;
    }

};

int main(){
    ifstream input("input.txt");
    string text = "", str="";
    
    while(input >> str) {
        text+=str+' ';
    }
    
    cout << text << endl;
    Ceasar C;
    string cipher = C.Encrypt(text);

    cout << cipher << endl;

    string plaintxt = C.Decrypt(cipher);

    cout << plaintxt << endl;
}