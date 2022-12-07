#include <ESP8266mDNS.h>
#include <LEAmDNS.h>
#include <LEAmDNS_Priv.h>
#include <LEAmDNS_lwIPdefs.h>

#include <ESP8266httpUpdate.h>

#include <ConditionalPrinter.h>
#include <ESP8266WiFiMesh.h>
#include <EncryptedConnectionData.h>
#include <EncryptedConnectionLog.h>
#include <EspnowConnectionManager.h>
#include <EspnowDatabase.h>
#include <EspnowEncryptionBroker.h>
#include <EspnowMeshBackend.h>
#include <EspnowNetworkInfo.h>
#include <EspnowProtocolInterpreter.h>
#include <EspnowTransmitter.h>
#include <ExpiringTimeTracker.h>
#include <FloodingMesh.h>
#include <HeapMonitor.h>
#include <JsonTranslator.h>
#include <MeshBackendBase.h>
#include <MeshCryptoInterface.h>
#include <MessageData.h>
#include <MutexTracker.h>
#include <NetworkInfo.h>
#include <NetworkInfoBase.h>
#include <PeerRequestLog.h>
#include <RequestData.h>
#include <ResponseData.h>
#include <Serializer.h>
#include <TcpIpMeshBackend.h>
#include <TcpIpNetworkInfo.h>
#include <TimeTracker.h>
#include <TransmissionOutcome.h>
#include <TransmissionResult.h>
#include <TypeConversionFunctions.h>
#include <UtilityFunctions.h>

#include <ArduinoWiFiServer.h>
#include <BearSSLHelpers.h>
#include <CertStoreBearSSL.h>
#include <ESP8266WiFi.h>
#include <ESP8266WiFiAP.h>
#include <ESP8266WiFiGeneric.h>
#include <ESP8266WiFiGratuitous.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266WiFiSTA.h>
#include <ESP8266WiFiScan.h>
#include <ESP8266WiFiType.h>
#include <WiFiClient.h>
#include <WiFiClientSecure.h>
#include <WiFiClientSecureBearSSL.h>
#include <WiFiServer.h>
#include <WiFiServerSecure.h>
#include <WiFiServerSecureBearSSL.h>
#include <WiFiUdp.h>

#include <ESP8266WebServer-impl.h>
#include <ESP8266WebServer.h>
#include <ESP8266WebServerSecure.h>
#include <Parsing-impl.h>
#include <Uri.h>

#include <ESP8266WebServer-impl.h>
#include <ESP8266WebServer.h>
#include <ESP8266WebServerSecure.h>
#include <Parsing-impl.h>
#include <Uri.h>

#include <BufferedPrint.h>
#include <FreeStack.h>
#include <MinimumSerial.h>
#include <SdFat.h>
#include <SdFatConfig.h>
#include <sdios.h>

#include <BufferedPrint.h>
#include <FreeStack.h>
#include <MinimumSerial.h>
#include <SdFat.h>
#include <SdFatConfig.h>
#include <sdios.h>

#include <ESP8266SSDP.h>

#include <ESP8266NetBIOS.h>

#include <ESP8266LLMNR.h>

#include <ESP8266HTTPUpdateServer-impl.h>
#include <ESP8266HTTPUpdateServer.h>

#include <ESP8266HTTPClient.h>

#include <ESP8266AVRISP.h>
#include <command.h>

#include <dummy.h>

int led_pin = D0; // NodeMCU의 디지털 입출력 핀 D0에 LED 연결

void setup() {
  pinMode(led_pin, OUTPUT); // led_pin(D0)을 출력으로 설정
}

void loop() {
  digitalWrite(led_pin, HIGH); // led_pin(D0)을 HIGH로 출력
  delay(2000); // 2000ms(2초)간 대기
  digitalWrite(led_pin, LOW); // led_pin(D0)을 LOW로 출력
  delay(1000); // 1000ms(1초)간 대기
}
