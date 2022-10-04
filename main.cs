using System; 
using System.Collections; 
using System.Collections.Generic; 
using UnityEngine; 
using UnityEngine.UI; 

#if UNITY_EDITOR 
using UnityEditor; 
#endif 

using System.IO; 
using UnityEngine.SceneManagement; 

public class Fuzzy : MonoBehaviour
{ 
   public int pathCounttxt=0, totCointxt=0, 
      radiustxt=0;
   private float hp1, hp1max, hp2, hp2min, hp2max, 
      hp3, hp3min; 
   private float score1, score1max, score2, score2min, 
      score2max, score3, score3min; 
   private float time1, time1max, time2, time2min, 
      time2max, time3, time3min; 
   private float[] rule = new float[27]; 
   private float[] predicat = new float[27]; 
   private float[] ztime = new float[3]; 
   private float[] zscore = new float[3]; 
   private float[] zhp = new float[3]; 
   private float tempTop = 0, tempBottom = 0, Z;

   // Use this for initialization 
   void Start () { 
   countLimit(pathCounttxt, totCointxt, 
      radiustxt); 
   } 

   public void fuzzyStart(float hp, float score, float time){ 
      countHp(hp); 
      countScore(score); 
      countTime(time); 

      int x = 0; 
         for (float i = 3; i > 0; i--) 
         { 
            for (float j = 3; j > 0; j--) 
            { 
               for (float k = 3; k > 0; k--) 
               { 
                  rule[x] = (3 * i + 2 * j + k - 6) / 12; 
                     x++; 
               } 
            } 
         } 

         x = 0; 
         for (int i = 0; i < 3; i++) 
         { 
            for (int j = 0; j < 3; j++) 
            { 
               for (int k = 0; k < 3; k++) 
               { 
                  if (ztime[i] <= zscore[j] && ztime[i] <= zhp[k]) 
                  { 
                     predicat[x] = ztime[i]; 
                     x++; 
                  } 
                  else if (zscore[j] <= ztime[i] && zscore[j] <= zhp[k]) 
                  { 
                     predicat[x] = zscore[j]; 
                     x++; 
                  } 
                  else 
                  {
                     predicat[x] = zhp[k]; 
                     x++; 
                  } 
               } 
            } 
         }

         for (int i = 0; i < 27; i++) 
         { 
            tempTop += predicat[i] * rule[i]; 
            tempBottom += predicat[i]; 
         } 
            Z = tempTop / tempBottom; 
            countIndex(Z); 
            } 
               public Fuzzy() 
            { 
 
            } 
         
   void countLimit(int pathCount, int totCoin, int radius) 
   { 
      hp1 = radius * 1 / 4; 
      hp2 = radius * 2 / 4; 
      hp3 = radius * 3 / 4; 
      hp1max = hp1 + ((hp2 - hp1) * 3 / 4); 
      hp2min = hp1 + ((hp2 - hp1) * 1 / 4); 
      hp2max = hp2 + ((hp3 - hp2) * 3 / 4); 
      hp3min = hp2 + ((hp3 - hp2) * 1 / 4); 
      score1 = totCoin * 1; 
      score2 = totCoin * 2; 
      score3 = totCoin * 3; 
      score1max = score1 + ((score2 - score1) * 3 / 4); 
      score2min = score1 + ((score2 - score1) * 1 / 4); 
      score2max = score2 + ((score3 - score2) * 3 / 4); 
      score3min = score2 + ((score3 - score2) * 1 / 4); 
      time1 = 2 * pathCount * 1 / 4; 
      time2 = 2 * pathCount * 2 / 4; 
      time3 = 2 * pathCount * 3 / 4; 
      time1max = time1 + ((time2 - time1) * 3 / 4); 
      time2min = time1 + ((time2 - time1) * 1 / 4); 
      time2max = time2 + ((time3 - time2) * 3 / 4); 
      time3min = time2 + ((time3 - time2) * 1 / 4); 
   } 

   void countHp(float hp) 
   { 
      if (hp < hp1max && hp >= hp1) 
      { 
         zhp[2] = (hp1max - hp) / (hp1max - hp1); 
      } 
      else if (hp < hp1)
      { 
         zhp[2] = 1; 
      } 
      else 
      { 
         zhp[2] = 0; 
      } 
      if (hp > hp2min && hp <= hp2) 
      { 
         zhp[1] = (hp - hp2min) / (hp2 - hp2min); 
      } 
      else if (hp >= hp2 && hp < hp2max) 
      { 
         zhp[1] = (hp2max - hp) / (hp2max - hp2); 
      } 
      else 
      { 
         zhp[1] = 0; 
      } 
      if (hp > hp3min && hp <= hp3) 
      { 
         zhp[0] = (hp - hp3min) / (hp3 - hp3min); 
      } 
      else if (hp > hp3) 
      { 
         zhp[0] = 1; 
      } 
      else 
      { 
         zhp[0] = 0; 
      } 
   } 

   void countScore(float score) 
   { 
      if (score < score1max && score >= score1) 
      { 
         zscore[2] = (score1max - score) / (score1max - score1); 
      } 
      else if (score < score1) 
      { 
         zscore[2] = 1; 
      } 
      else 
      { 
         zscore[2] = 0; 
      } 
      if (score > score2min && score <= score2) 
      { 
         zscore[1] = (score - score2min) / (score2 - score2min); 
      } 
      else if (score >= score2 && score < score2max) 
      {
         zscore[1] = (score2max - score) / (score2max - score2); 
      } 
      else 
      { 
         zscore[1] = 0; 
      } 
      if (score > score3min && score <= score3) 
      { 
         zscore[0] = (score - score3min) / (score3 - score3min); 
      } 
      else if (score > score3) 
      { 
         zscore[0] = 1; 
      } 
      else 
      { 
         zscore[0] = 0; 
      } 
   } 

   void countTime(float time) 
   { 
      if (time < time1max && time >= time1) 
      { 
         ztime[0] = (time1max - time) / (time1max - time1); 
      } 
      else if (time < time1) 
      { 
         ztime[0] = 1; 
      } 
      else 
      { 
         ztime[0] = 0; 
      } 
      if (time > time2min && time <= time2) 
      { 
         ztime[1] = (time - time2min) / (time2 - time2min); 
      } 
      else if (time >= time2 && time < time2max) 
      { 
         ztime[1] = (time2max - time) / (time2max - time2); 
      } 
      else 
      { 
         ztime[1] = 0; 
      } 
      if (time > time3min && time <= time3) 
      { 
         ztime[2] = (time - time3min) / (time3 - time3min); 
      } 
      else if (time > time3)
      { 
         ztime[2] = 1; 
      } 
      else 
      { 
         ztime[2] = 0; 
      } 
   } 

   void countIndex(float Z) 
   { 
      string path = "Assets/MazeGenerator/Scripts/Level.txt"; 
   
   //baca text 
   StreamReader reader = new StreamReader(path); 
   int levelTxt = int.Parse(reader.ReadToEnd()); 
   reader.Close(); 
 
   //tulis text 
   float count=Z; 
      if (count <= 0.25 && levelTxt>5) 
      { 
         Debug.Log("turun level"); 
         levelTxt -= 1; 
         StreamWriter writer = new 
         StreamWriter(path, false); 
         writer.Write(levelTxt+""); 
         writer.Close(); 
         SceneManager.LoadScene("fuzzy"); 
      }  

      else if (count > 0.25 && count < 0.75) 
      { 
         Debug.Log("level tetap"); 
         StreamWriter writer = new 
         StreamWriter(path, false); 
         writer.Write(levelTxt + ""); 
         writer.Close(); 
         SceneManager.LoadScene("fuzzy"); 
      } 

      else if (count >= 0.75) 
      { 
         Debug.Log("naik level"); 
         levelTxt += 1; 
         StreamWriter writer = new 
         StreamWriter(path, false); 
         writer.Write(levelTxt+""); 
         writer.Close(); 
         SceneManager.LoadScene("fuzzy"); 
      }

      else 
      { 
         SceneManager.LoadScene("fuzzy"); 
      } 
   } 
 
}