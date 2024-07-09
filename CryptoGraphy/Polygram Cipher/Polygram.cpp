#include<bits/stdc++.h>

using namespace std;

map<string, string> dic1, dic2;
set<string> st;

class Polygram{
public:
    string edcrypt(string text, map<string, string> dic1){
        string s = "", res="";
        for(char ch : text){

            if(ch == ' ' || ch == '.') {res += ch; continue;}
            s += ch;
            if(dic1[s] != "") {
                res += dic1[s];
                s="";
            }
        }
        res+=s;
        return res;
    }

};


int main(){
    ifstream file("dictionary.txt");

    string str1, str2;

    while(file >> str1 >> str2){
        st.insert(str1);
        dic1[str1] = str2;
        dic2[str2] = str1;
    }

    string text = "";
    ifstream file1("input.txt");

    while(file1 >> str1){
        text += str1 + ' ';
    }

    Polygram p;

    string cipher = p.edcrypt(text, dic1);
    string plain = p.edcrypt(cipher, dic2);

    cout << cipher << "\n" << plain << endl;
}