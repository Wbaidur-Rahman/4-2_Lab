#include<bits/stdc++.h>
using namespace std;

class Solution {
public:
    int romanToInt(string s) {
        map<char, int> dic;
        dic['I'] = 1;
        dic['V'] = 5;
        dic['X'] = 10;
        dic['L'] = 50;
        dic['C'] = 100;
        dic['D'] = 500;
        dic['M'] = 1000;

        int temp = 0,ans=0;
    
        for(char ch: s){
            if(dic[ch] > temp) ans-=2*temp;
            ans += dic[ch];
            temp = dic[ch];    
        }

        return ans;
                
    }
};

int main(){
    Solution S;
    S.romanToInt("III");
    S.romanToInt("I");
    S.romanToInt("VI");
    S.romanToInt("IV");
    S.romanToInt("IX");
    S.romanToInt("X");
    S.romanToInt("XII");
    S.romanToInt("XL");
    S.romanToInt("L");
    S.romanToInt("LXX");
    S.romanToInt("XC");
    S.romanToInt("CXX");
    S.romanToInt("CD");
    S.romanToInt("DC");
    S.romanToInt("CM");
    S.romanToInt("MCC");

}